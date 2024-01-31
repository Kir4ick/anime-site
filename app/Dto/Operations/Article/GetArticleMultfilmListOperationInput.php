<?php

namespace App\Dto\Operations\Article;

class GetArticleMultfilmListOperationInput
{
    private int $page;

    private int $limit_page;

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return GetArticleMultfilmListOperationInput
     */
    public function setPage(int $page): GetArticleMultfilmListOperationInput
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimitPage(): int
    {
        return $this->limit_page;
    }

    /**
     * @param int $limit_page
     * @return GetArticleMultfilmListOperationInput
     */
    public function setLimitPage(int $limit_page): GetArticleMultfilmListOperationInput
    {
        $this->limit_page = $limit_page;
        return $this;
    }

}
