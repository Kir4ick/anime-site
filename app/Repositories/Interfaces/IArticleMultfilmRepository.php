<?php

namespace App\Repositories\Interfaces;

use App\Dto\Repositories\ArticleMultfilm\CountArticleMultfilmListRepositoriesInput;
use App\Dto\Repositories\ArticleMultfilm\FirstCreateArticleRepositoryInput;
use App\Dto\Repositories\ArticleMultfilm\FirstCreateArticleRepositoryOutput;
use App\Dto\Repositories\ArticleMultfilm\GetArticleMultfilmListRepositoriesInput;
use App\Dto\Repositories\ArticleMultfilm\GetArticleMultfilmListRepositoriesOutput;

interface IArticleMultfilmRepository
{
    public function firstCreateArticle(
        FirstCreateArticleRepositoryInput $input
    ): FirstCreateArticleRepositoryOutput;

    public function getCountArticle(
        CountArticleMultfilmListRepositoriesInput $input
    ): int;

    public function getListArticles(
        GetArticleMultfilmListRepositoriesInput $input
    ): GetArticleMultfilmListRepositoriesOutput;
}
