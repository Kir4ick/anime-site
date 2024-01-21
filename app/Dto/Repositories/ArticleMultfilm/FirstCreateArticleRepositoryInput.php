<?php

namespace App\Dto\Repositories\ArticleMultfilm;

use Illuminate\Http\UploadedFile;

class FirstCreateArticleRepositoryInput
{
    private string $title;

    private string $premier;

    private string $poster;

    private int $user_id;

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     * @return FirstCreateArticleRepositoryInput
     */
    public function setUserId(int $user_id): FirstCreateArticleRepositoryInput
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return FirstCreateArticleRepositoryInput
     */
    public function setTitle(string $title): FirstCreateArticleRepositoryInput
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getPremier(): string
    {
        return $this->premier;
    }

    /**
     * @param string $premier
     * @return FirstCreateArticleRepositoryInput
     */
    public function setPremier(string $premier): FirstCreateArticleRepositoryInput
    {
        $this->premier = $premier;
        return $this;
    }

    /**
     * @return string
     */
    public function getPoster(): string
    {
        return $this->poster;
    }

    /**
     * @param string $poster
     * @return FirstCreateArticleRepositoryInput
     */
    public function setPoster(string $poster): FirstCreateArticleRepositoryInput
    {
        $this->poster = $poster;
        return $this;
    }

}
