<?php

namespace App\Http\Controllers\RestApi;

use App\Dto\Operations\Article\FirstCreateArticleOperationInput;
use App\Dto\Operations\Article\GetArticleMultfilmListOperationInput;
use App\Http\Controllers\Controller;
use App\Http\Operations\Interfaces\IArticlesOperations;
use App\Http\Requests\RestApi\FisrtCreateArticleMultfilmRequest;
use App\Http\Resources\Article\ArticleCreatedResource;
use App\Http\Resources\Article\ArticleList;
use App\Http\Resources\ErrorResource;

class ArtcleMultfilmController extends Controller
{
    public function __construct(
        private readonly IArticlesOperations $operations
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

        return new ArticleCreatedResource($operation_response->getArticleMultfilm());
    }

    public function list()
    {
        $operation_response = $this->operations->getMultfilmList(
            (new GetArticleMultfilmListOperationInput())->setLimitPage(1000)->setPage(0)
        );
        return ArticleList::collection($operation_response->getArticlesCollection());
    }

}
