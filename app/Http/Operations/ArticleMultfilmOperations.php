<?php

namespace App\Http\Operations;

use App\Dto\Operations\ArticleMultfilm\FirstCreateArticleOperationInput;
use App\Dto\Operations\ArticleMultfilm\FirstCreateArticleOperationOutput;
use App\Dto\Repositories\ArticleMultfilm\FirstCreateArticleRepositoryInput;
use App\Http\Operations\Interfaces\IArticlesMultfilmOperations;
use App\Repositories\Interfaces\IArticleMultfilmRepository;
use App\Services\ImageLoader\Interfaces\IImageLoader;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleMultfilmOperations implements IArticlesMultfilmOperations
{

    public function __construct(
        private readonly IArticleMultfilmRepository $repository,
        private readonly IImageLoader $loader
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

            $repository_response = $this->repository->firstCreateArticleRepository($repository_input);
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
}
