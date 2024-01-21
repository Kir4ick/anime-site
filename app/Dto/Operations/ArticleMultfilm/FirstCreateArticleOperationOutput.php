<?php

namespace App\Dto\Operations\ArticleMultfilm;

use App\Models\ArticleMultfilm;

class FirstCreateArticleOperationOutput
{
    private ?string $error_message;

    private ?ArticleMultfilm $article_multfilm;

    /**
     * @return string|null
     */
    public function getErrorMessage(): ?string
    {
        return $this->error_message;
    }

    /**
     * @param string|null $error_message
     * @return FirstCreateArticleOperationOutput
     */
    public function setErrorMessage(?string $error_message): FirstCreateArticleOperationOutput
    {
        $this->error_message = $error_message;
        return $this;
    }

    /**
     * @return ArticleMultfilm|null
     */
    public function getArticleMultfilm(): ?ArticleMultfilm
    {
        return $this->article_multfilm;
    }

    /**
     * @param ArticleMultfilm|null $article_multfilm
     * @return FirstCreateArticleOperationOutput
     */
    public function setArticleMultfilm(?ArticleMultfilm $article_multfilm): FirstCreateArticleOperationOutput
    {
        $this->article_multfilm = $article_multfilm;
        return $this;
    }

}
