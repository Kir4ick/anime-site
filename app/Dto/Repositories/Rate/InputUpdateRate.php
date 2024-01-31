<?php

namespace App\Dto\Repositories\Rate;

class InputUpdateRate
{
    private int $article_id;

    private int $user_id;

    private int $rate;

    /**
     * @return int
     */
    public function getArticleId(): int
    {
        return $this->article_id;
    }

    /**
     * @param int $article_id
     * @return InputCreateRate
     */
    public function setArticleId(int $article_id): InputUpdateRate
    {
        $this->article_id = $article_id;
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
     * @return InputCreateRate
     */
    public function setUserId(int $user_id): InputUpdateRate
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getRate(): int
    {
        return $this->rate;
    }

    /**
     * @param int $rate
     * @return InputCreateRate
     */
    public function setRate(int $rate): InputUpdateRate
    {
        $this->rate = $rate;
        return $this;
    }

}
