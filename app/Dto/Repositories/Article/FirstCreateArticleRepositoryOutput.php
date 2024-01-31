<?php

namespace App\Dto\Repositories\Article;

use App\Models\Article;

class FirstCreateArticleRepositoryOutput
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
     * @return FirstCreateArticleRepositoryOutput
     */
    public function setArticleMultfilm(?Article $article_multfilm): FirstCreateArticleRepositoryOutput
    {
        $this->article_multfilm = $article_multfilm;
        return $this;
    }

}
