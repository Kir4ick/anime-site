<?php

namespace App\Http\Operations\Interfaces;

use App\Dto\Operations\ArticleMultfilm\FirstCreateArticleOperationInput;
use App\Dto\Operations\ArticleMultfilm\FirstCreateArticleOperationOutput;
use App\Dto\Operations\ArticleMultfilm\GetArticleMultfilmListOperationInput;
use App\Dto\Operations\ArticleMultfilm\GetArticleMultfilmListOperationOutput;

interface IArticlesMultfilmOperations
{
    public function firstCreateArticleMultfilm(
        FirstCreateArticleOperationInput $input
    ): FirstCreateArticleOperationOutput;

    public function getMultfilmList(
        GetArticleMultfilmListOperationInput $input
    ): GetArticleMultfilmListOperationOutput;
}
