<?php

namespace App\Repositories\Interfaces;

use App\Dto\Repositories\Article\CountArticleMultfilmListRepositoriesInput;
use App\Dto\Repositories\Article\FirstCreateArticleRepositoryInput;
use App\Dto\Repositories\Article\FirstCreateArticleRepositoryOutput;
use App\Dto\Repositories\Article\GetArticleMultfilmListRepositoriesInput;
use App\Dto\Repositories\Article\GetArticleMultfilmListRepositoriesOutput;
use App\Dto\Repositories\Article\UpdateArticleMultfilmRepositoriesInput;
use App\Dto\Repositories\Article\UpdateArticleMultfilmRepositoriesOutput;

interface IArticleRepository
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

    public function updateArticle(
        UpdateArticleMultfilmRepositoriesInput $input
    ): UpdateArticleMultfilmRepositoriesOutput;
}
