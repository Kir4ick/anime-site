<?php

namespace App\Dto\Repositories\Character;

use Illuminate\Database\Eloquent\Collection;

class GetCharactersOutput
{
    private ?Collection $characters_collection;

    private ?int $page;

    private ?string $error_message = null;

    private ?int $limit;

    /**
     * @return Collection|null
     */
    public function getCharactersCollection(): ?Collection
    {
        return $this->characters_collection;
    }

    /**
     * @param Collection|null $characters_collection
     * @return GetCharactersOutput
     */
    public function setCharactersCollection(?Collection $characters_collection): GetCharactersOutput
    {
        $this->characters_collection = $characters_collection;
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
     * @return GetCharactersOutput
     */
    public function setPage(?int $page): GetCharactersOutput
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getErrorMessage(): ?string
    {
        return $this->error_message;
    }

    /**
     * @param string|null $error_message
     * @return GetCharactersOutput
     */
    public function setErrorMessage(?string $error_message): GetCharactersOutput
    {
        $this->error_message = $error_message;
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
     * @return GetCharactersOutput
     */
    public function setLimit(?int $limit): GetCharactersOutput
    {
        $this->limit = $limit;
        return $this;
    }

}
