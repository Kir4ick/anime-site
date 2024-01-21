<?php

namespace App\Http\Controllers\RestApi;

use App\Dto\Operations\ArticleMultfilm\FirstCreateArticleOperationInput;
use App\Http\Controllers\Controller;
use App\Http\Operations\Interfaces\IArticlesMultfilmOperations;
use App\Http\Requests\RestApi\FisrtCreateArticleMultfilmRequest;
use App\Http\Resources\ArticleMultfilm\ArticleMultfilmAfterFirstCreatedResource;
use App\Http\Resources\ErrorResource;

class ArtcleMultfilmController extends Controller
{
    public function __construct(
        private readonly IArticlesMultfilmOperations $operations
    ){}

    public function firstCreate(FisrtCreateArticleMultfilmRequest $request)
    {
        $operation_response = $this->operations->firstCreateArticleMultfilm(
            (new FirstCreateArticleOperationInput())
                ->setTitle($request->title)
                ->setPremier(new \DateTime($request->premier))
                ->setPoster($request->poster)
        );

        if ($operation_response->getErrorMessage() !== null) {
            return new ErrorResource([
                'error_message' => $operation_response->getErrorMessage(),
                'code' => 500
            ]);
        }

        return new ArticleMultfilmAfterFirstCreatedResource($operation_response->getArticleMultfilm());
    }
}
