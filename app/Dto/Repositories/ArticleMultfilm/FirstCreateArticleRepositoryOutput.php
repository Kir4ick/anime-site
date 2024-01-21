<?php

namespace App\Dto\Repositories\ArticleMultfilm;

use App\Models\ArticleMultfilm;

class FirstCreateArticleRepositoryOutput
{

    private ?ArticleMultfilm $article_multfilm;

    /**
     * @return ArticleMultfilm|null
     */
    public function getArticleMultfilm(): ?ArticleMultfilm
    {
        return $this->article_multfilm;
    }

    /**
     * @param ArticleMultfilm|null $article_multfilm
     * @return FirstCreateArticleRepositoryOutput
     */
    public function setArticleMultfilm(?ArticleMultfilm $article_multfilm): FirstCreateArticleRepositoryOutput
    {
        $this->article_multfilm = $article_multfilm;
        return $this;
    }

}
