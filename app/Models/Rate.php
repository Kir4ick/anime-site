<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $rate
 * @property int $user_id
 * @property int $article_id
 */
class Rate extends Model
{

    protected $fillable = [
        'rate'
    ];

    /**
     * @return int
     */
    public function getRate(): int
    {
        return $this->rate;
    }

    /**
     * @param int $rate
     * @return Rate
     */
    public function setRate(int $rate): Rate
    {
        $this->rate = $rate;
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
     * @return Rate
     */
    public function setUserId(int $user_id): Rate
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getArticleId(): int
    {
        return $this->article_id;
    }

    /**
     * @param int $article_id
     * @return Rate
     */
    public function setArticleId(int $article_id): Rate
    {
        $this->article_id = $article_id;
        return $this;
    }
}
