<?php

namespace App\Http\Operations;

use App\Dto\Operations\ArticleMultfilm\FirstCreateArticleOperationInput;
use App\Dto\Operations\ArticleMultfilm\FirstCreateArticleOperationOutput;
use App\Dto\Repositories\ArticleMultfilm\FirstCreateArticleRepositoryInput;
use App\Http\Operations\Interfaces\IArticlesMultfilmOperations;
use App\Repositories\Interfaces\IArticleMultfilmRepository;
use Illuminate\Support\Facades\Auth;

class ArticleMultfilmOperations implements IArticlesMultfilmOperations
{

    public function __construct(private readonly IArticleMultfilmRepository $repository){}

    public function firstCreateArticleMultfilm(
        FirstCreateArticleOperationInput $input
    ): FirstCreateArticleOperationOutput {
        $article_multfilm = null;
        $error_message = null;

        try {
            $poster_path = $input->getPoster()->store('posters');
            $user_id = Auth::id();

            $repository_input = (new FirstCreateArticleRepositoryInput())
                ->setPremier($input->getPremier()->format('Y-m-d'))
                ->setTitle($input->getTitle())
                ->setPoster($poster_path)
                ->setUserId($user_id);

            $repository_response = $this->repository->firstCreateArticleRepository($repository_input);
            if ($repository_response->getArticleMultfilm() == null) {
                $error_message = __('Не удалось создать новую статью по мультфильму');
            }

        } catch (\Exception $exception) {
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
