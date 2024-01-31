<?php

namespace App\Dto\Repositories\Rate;

class InputCreateRate
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
    public function setArticleId(int $article_id): InputCreateRate
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
    public function setUserId(int $user_id): InputCreateRate
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
    public function setRate(int $rate): InputCreateRate
    {
        $this->rate = $rate;
        return $this;
    }

}
