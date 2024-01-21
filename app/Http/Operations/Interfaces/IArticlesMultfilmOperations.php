<?php

namespace App\Http\Operations\Interfaces;

use App\Dto\Operations\ArticleMultfilm\FirstCreateArticleOperationInput;
use App\Dto\Operations\ArticleMultfilm\FirstCreateArticleOperationOutput;

interface IArticlesMultfilmOperations
{
    public function firstCreateArticleMultfilm(
        FirstCreateArticleOperationInput $input
    ): FirstCreateArticleOperationOutput;
}
