<?php

namespace App\Dto\Repositories\ArticleMultfilm;

/**
 * Пока пустое, мб в будущем будут ещё фильтры
 */
class GetArticleMultfilmListRepositoriesInput
{
    private int $offset;

    private int $limit;

    private int $user_id;

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * @param int $offset
     * @return GetArticleMultfilmListRepositoriesInput
     */
    public function setOffset(int $offset): GetArticleMultfilmListRepositoriesInput
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     * @return GetArticleMultfilmListRepositoriesInput
     */
    public function setLimit(int $limit): GetArticleMultfilmListRepositoriesInput
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     * @return GetArticleMultfilmListRepositoriesInput
     */
    public function setUserId(int $user_id): GetArticleMultfilmListRepositoriesInput
    {
        $this->user_id = $user_id;
        return $this;
    }

}
