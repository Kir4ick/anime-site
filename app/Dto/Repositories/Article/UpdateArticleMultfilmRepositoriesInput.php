<?php

namespace App\Dto\Repositories\Article;

use App\Models\Article;

class UpdateArticleMultfilmRepositoriesInput
{
    private ?int $article_id = null;

    private ?string $story = null;

    private ?string $story_image = null;

    private ?string $history_created = null;

    private ?string $history_image = null;

    private ?array $images = null;

    /**
     * @return int|null
     */
    public function getArticleId(): ?int
    {
        return $this->article_id;
    }

    /**
     * @param int|null $article_id
     * @return UpdateArticleMultfilmRepositoriesInput
     */
    public function setArticleId(?int $article_id): UpdateArticleMultfilmRepositoriesInput
    {
        $this->article_id = $article_id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStory(): ?string
    {
        return $this->story;
    }

    /**
     * @param string|null $story
     * @return UpdateArticleMultfilmRepositoriesInput
     */
    public function setStory(?string $story): UpdateArticleMultfilmRepositoriesInput
    {
        $this->story = $story;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStoryImage(): ?string
    {
        return $this->story_image;
    }

    /**
     * @param string|null $story_image
     * @return UpdateArticleMultfilmRepositoriesInput
     */
    public function setStoryImage(?string $story_image): UpdateArticleMultfilmRepositoriesInput
    {
        $this->story_image = $story_image;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getHistoryCreated(): ?string
    {
        return $this->history_created;
    }

    /**
     * @param string|null $history_created
     * @return UpdateArticleMultfilmRepositoriesInput
     */
    public function setHistoryCreated(?string $history_created): UpdateArticleMultfilmRepositoriesInput
    {
        $this->history_created = $history_created;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getHistoryImage(): ?string
    {
        return $this->history_image;
    }

    /**
     * @param string|null $history_image
     * @return UpdateArticleMultfilmRepositoriesInput
     */
    public function setHistoryImage(?string $history_image): UpdateArticleMultfilmRepositoriesInput
    {
        $this->history_image = $history_image;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getImages(): ?array
    {
        return $this->images;
    }

    /**
     * @param array|null $images
     * @return UpdateArticleMultfilmRepositoriesInput
     */
    public function setImages(?array $images): UpdateArticleMultfilmRepositoriesInput
    {
        $this->images = $images;
        return $this;
    }
}
