<?php

namespace App\Dto\Operations\ArticleMultfilm;

use Illuminate\Database\Eloquent\Collection;

class GetArticleMultfilmListOperationOutput
{
    private int $total_pages;

    private Collection $articles_collection;

    private int $current_page;

    /**
     * @return int
     */
    public function getTotalPages(): int
    {
        return $this->total_pages;
    }

    /**
     * @param int $total_pages
     * @return GetArticleMultfilmListOperationOutput
     */
    public function setTotalPages(int $total_pages): GetArticleMultfilmListOperationOutput
    {
        $this->total_pages = $total_pages;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getArticlesCollection(): Collection
    {
        return $this->articles_collection;
    }

    /**
     * @param Collection $articles_collection
     * @return GetArticleMultfilmListOperationOutput
     */
    public function setArticlesCollection(Collection $articles_collection): GetArticleMultfilmListOperationOutput
    {
        $this->articles_collection = $articles_collection;
        return $this;
    }

    /**
     * @return int
     */
    public function getCurrentPage(): int
    {
        return $this->current_page;
    }

    /**
     * @param int $current_page
     * @return GetArticleMultfilmListOperationOutput
     */
    public function setCurrentPage(int $current_page): GetArticleMultfilmListOperationOutput
    {
        $this->current_page = $current_page;
        return $this;
    }

}
