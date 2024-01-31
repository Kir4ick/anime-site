<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $image
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property int $article_multfilm_id
 */
class Character extends Model
{
    protected $fillable = [
        'name',
        'image',
        'description',
    ];

    public function article()
    {
        return $this->hasOne(Article::class);
    }

    /**
     * @param int $id
     * @return Character
     */
    public function setId(int $id): Character
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Character
     */
    public function setName(string $name): Character
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return Character
     */
    public function setImage(string $image): Character
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Character
     */
    public function setDescription(string $description): Character
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * @param string $created_at
     * @return Character
     */
    public function setCreatedAt(string $created_at): Character
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    /**
     * @param string $updated_at
     * @return Character
     */
    public function setUpdatedAt(string $updated_at): Character
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return int
     */
    public function getArticleMultfilmId(): int
    {
        return $this->article_multfilm_id;
    }

    /**
     * @param int $article_multfilm_id
     * @return Character
     */
    public function setArticleMultfilmId(int $article_multfilm_id): Character
    {
        $this->article_multfilm_id = $article_multfilm_id;
        return $this;
    }

}
