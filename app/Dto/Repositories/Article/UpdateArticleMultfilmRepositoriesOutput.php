<?php

namespace App\Dto\Repositories\Article;

use App\Models\Article;

class UpdateArticleMultfilmRepositoriesOutput
{
    private ?Article $article_multfilm;

    /**
     * @return Article|null
     */
    public function getArticleMultfilm(): ?Article
    {
        return $this->article_multfilm;
    }

    /**
     * @param Article|null $article_multfilm
     * @return UpdateArticleMultfilmRepositoriesOutput
     */
    public function setArticleMultfilm(?Article $article_multfilm): UpdateArticleMultfilmRepositoriesOutput
    {
        $this->article_multfilm = $article_multfilm;
        return $this;
    }
}
