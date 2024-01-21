<?php

namespace App\Repositories;

use App\Dto\Repositories\ArticleMultfilm\FirstCreateArticleRepositoryInput;
use App\Dto\Repositories\ArticleMultfilm\FirstCreateArticleRepositoryOutput;
use App\Models\ArticleMultfilm;
use App\Repositories\Interfaces\IArticleMultfilmRepository;

class ArticleMultfilmRepository implements IArticleMultfilmRepository
{

    public function firstCreateArticleRepository(
        FirstCreateArticleRepositoryInput $input
    ): FirstCreateArticleRepositoryOutput {
        /** @var ArticleMultfilm $article_mult */
        $article_mult = ArticleMultfilm::query()->create([
            'title' => $input->getTitle(),
            'created' => $input->getPremier(),
            'poster' => $input->getPoster(),
            'user_id' => $input->getUserId(),
            'story' => '{}',
            'history_created_image' => '{}',
            'images' => '{}'
        ]);

        return (new FirstCreateArticleRepositoryOutput())->setArticleMultfilm($article_mult);
    }
}
