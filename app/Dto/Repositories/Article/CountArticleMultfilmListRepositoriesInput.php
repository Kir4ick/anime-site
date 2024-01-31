<?php

namespace App\Dto\Repositories\Article;

/**
 * Пока пустое, мб в будущем будут ещё фильтры
 */
class CountArticleMultfilmListRepositoriesInput
{
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
     * @return CountArticleMultfilmListRepositoriesInput
     */
    public function setUserId(int $user_id): CountArticleMultfilmListRepositoriesInput
    {
        $this->user_id = $user_id;
        return $this;
    }

}
