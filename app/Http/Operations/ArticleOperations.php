<?php

namespace App\Http\Operations;

use App\Dto\Operations\Article\FirstCreateArticleOperationInput;
use App\Dto\Operations\Article\FirstCreateArticleOperationOutput;
use App\Dto\Operations\Article\GetArticleMultfilmListOperationInput;
use App\Dto\Operations\Article\GetArticleMultfilmListOperationOutput;
use App\Dto\Repositories\Article\CountArticleMultfilmListRepositoriesInput;
use App\Dto\Repositories\Article\FirstCreateArticleRepositoryInput;
use App\Dto\Repositories\Article\GetArticleMultfilmListRepositoriesInput;
use App\Dto\Repositories\Article\UpdateArticleMultfilmRepositoriesInput;
use App\Http\Operations\Interfaces\IArticlesMultfilmOperations;
use App\Models\Article;
use App\Repositories\Interfaces\IArticleRepository;
use App\Services\ImageLoader\Interfaces\IImageLoader;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleOperations implements IArticlesMultfilmOperations
{

    public function __construct(
        private readonly IArticleRepository $repository,
        private readonly IImageLoader       $loader
    ){}

    public function firstCreateArticleMultfilm(
        FirstCreateArticleOperationInput $input
    ): FirstCreateArticleOperationOutput {
        $article_multfilm = null;
        $error_message = null;

        try {
            $poster_path = $this->loader->load($input->getPoster(), 'posters');
            if ($poster_path === '') {
                $error_message = __('Не удалось загрузить постер');
                return (new FirstCreateArticleOperationOutput())
                    ->setErrorMessage($error_message);
            }

            $user_id = Auth::user()->id;

            $repository_input = (new FirstCreateArticleRepositoryInput())
                ->setPremier($input->getPremier()->format('Y-m-d'))
                ->setTitle($input->getTitle())
                ->setPoster($poster_path)
                ->setUserId($user_id);

            $repository_response = $this->repository->firstCreateArticle($repository_input);
            if ($repository_response->getArticleMultfilm() == null) {
                $error_message = __('Не удалось создать новую статью по мультфильму');
            }
            $article_multfilm = $repository_response->getArticleMultfilm();

        } catch (\Exception $exception) {
            if (isset($poster_path)) {
                Storage::disk('local')->delete($poster_path);
            }

            $error_message = __('Не удалось создать новую статью по мультфильму');
            logs()->error(
                sprintf('[create-multfilm] %s %s', $exception->getMessage(), $exception->getTraceAsString())
            );
        }

        return (new FirstCreateArticleOperationOutput())
            ->setArticleMultfilm($article_multfilm)
            ->setErrorMessage($error_message);
    }

    public function getMultfilmList(GetArticleMultfilmListOperationInput $input): GetArticleMultfilmListOperationOutput
    {
        $user_id = Auth::user()->id;

        $count = $this->repository->getCountArticle(
            (new CountArticleMultfilmListRepositoriesInput())->setUserId($user_id)
        );

        $offset = $input->getLimitPage() * $input->getPage();

        $collection = $this->repository->getListArticles(
            (new GetArticleMultfilmListRepositoriesInput())
                ->setLimit($input->getLimitPage())
                ->setOffset($offset)
                ->setUserId($user_id)
        );

        $total_pages = (int)($count / $input->getLimitPage());
        if ($total_pages === 0) {
            $total_pages = 1;
        }

        return (new GetArticleMultfilmListOperationOutput())
            ->setArticlesCollection($collection->getArticlesCollection())
            ->setCurrentPage($input->getPage())
            ->setTotalPages($total_pages);
    }

    public function updateStoryInArticle(
        int $article_id, string $story_first, string $story_second, string $story_bottom, UploadedFile $image
    ): Article {
        $path_uploaded = $image->store('/history');

        $repository_dto = new UpdateArticleMultfilmRepositoriesInput();
        $repository_dto->setArticleId($article_id)
            ->setStoryImage($path_uploaded)
            ->setStory(json_encode([
                'story_first' => $story_first,
                'story_second' => $story_second,
                'story_bottom' => $story_bottom
            ]));

        $result = $this->repository->updateArticle($repository_dto);

        return $result->getArticleMultfilm();
    }
}
