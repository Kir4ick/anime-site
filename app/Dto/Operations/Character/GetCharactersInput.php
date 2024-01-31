<?php

namespace App\Dto\Operations\Character;

class GetCharactersInput
{
    private ?int $article_id;

    private ?int $limit;

    private ?int $page;

    /**
     * @return int|null
     */
    public function getArticleId(): ?int
    {
        return $this->article_id;
    }

    /**
     * @param int|null $article_id
     * @return GetCharactersInput
     */
    public function setArticleId(?int $article_id): GetCharactersInput
    {
        $this->article_id = $article_id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * @param int|null $limit
     * @return GetCharactersInput
     */
    public function setLimit(?int $limit): GetCharactersInput
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPage(): ?int
    {
        return $this->page;
    }

    /**
     * @param int|null $page
     * @return GetCharactersInput
     */
    public function setPage(?int $page): GetCharactersInput
    {
        $this->page = $page;
        return $this;
    }

}
