<?php

namespace App\Dto\Operations\Article;

use App\Models\Article;

class FirstCreateArticleOperationOutput
{
    private ?string $error_message;

    private ?Article $article_multfilm;

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
     * @return Article|null
     */
    public function getArticleMultfilm(): ?Article
    {
        return $this->article_multfilm;
    }

    /**
     * @param Article|null $article_multfilm
     * @return FirstCreateArticleOperationOutput
     */
    public function setArticleMultfilm(?Article $article_multfilm): FirstCreateArticleOperationOutput
    {
        $this->article_multfilm = $article_multfilm;
        return $this;
    }

}
