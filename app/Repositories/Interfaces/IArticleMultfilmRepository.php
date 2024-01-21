<?php

namespace App\Repositories\Interfaces;

use App\Dto\Repositories\ArticleMultfilm\FirstCreateArticleRepositoryInput;
use App\Dto\Repositories\ArticleMultfilm\FirstCreateArticleRepositoryOutput;

interface IArticleMultfilmRepository
{
    public function firstCreateArticleRepository(
        FirstCreateArticleRepositoryInput $input
    ): FirstCreateArticleRepositoryOutput;
}
