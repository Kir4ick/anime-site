<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property $title
 * @property $poster
 * @property $created
 * @property $image_first
 * @property $image_second
 * @property $description
 * @property $quote
 * @property $story
 * @property $image_story
 * @property $sketch
 * @property $shot
 * @property $history_created
 * @property $gallery
 * @property User $user
 */
class Article extends Model
{

    protected $fillable = [
        'title',
        'poster',
        'created',
        'image_first',
        'image_second',
        'description',
        'quote',
        'story',
        'image_story',
        'sketch',
        'shot',
        'history_created',
        'gallery',
    ];

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function ratesCount()
    {
        return $this->hasMany(Rate::class)->count();
    }

    public function ratesAvg()
    {
        return $this->hasMany(Rate::class)->avg('rate');
    }

    public function characters()
    {
        return $this->hasMany(Character::class);
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPoster()
    {
        return $this->poster;
    }

    /**
     * @param mixed $poster
     * @return Article
     */
    public function setPoster($poster)
    {
        $this->poster = $poster;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     * @return Article
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImageFirst()
    {
        return $this->image_first;
    }

    /**
     * @param mixed $image_first
     * @return Article
     */
    public function setImageFirst($image_first)
    {
        $this->image_first = $image_first;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImageSecond()
    {
        return $this->image_second;
    }

    /**
     * @param mixed $image_second
     * @return Article
     */
    public function setImageSecond($image_second)
    {
        $this->image_second = $image_second;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return Article
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuote()
    {
        return $this->quote;
    }

    /**
     * @param mixed $quote
     * @return Article
     */
    public function setQuote($quote)
    {
        $this->quote = $quote;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStory()
    {
        return $this->story;
    }

    /**
     * @param mixed $story
     * @return Article
     */
    public function setStory($story)
    {
        $this->story = $story;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImageStory()
    {
        return $this->image_story;
    }

    /**
     * @param mixed $image_story
     * @return Article
     */
    public function setImageStory($image_story)
    {
        $this->image_story = $image_story;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSketch()
    {
        return $this->sketch;
    }

    /**
     * @param mixed $sketch
     * @return Article
     */
    public function setSketch($sketch)
    {
        $this->sketch = $sketch;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getShot(): string
    {
        return $this->shot;
    }

    /**
     * @param mixed $shot
     * @return Article
     */
    public function setShot($shot): self
    {
        $this->shot = $shot;
        return $this;
    }

    /**
     * @return string
     */
    public function getHistoryCreated(): string
    {
        return $this->history_created;
    }

    /**
     * @param string $history_created
     * @return Article
     */
    public function setHistoryCreated(string $history_created)
    {
        $this->history_created = $history_created;
        return $this;
    }

    /**
     * @return string
     */
    public function getGallery(): string
    {
        return json_decode($this->gallery);
    }

    /**
     * @param mixed $gallery
     * @return Article
     */
    public function setGallery(array $gallery): self
    {
        $this->gallery = json_encode($gallery, JSON_UNESCAPED_UNICODE);
        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return Article
     */
    public function setUser(User $user): Article
    {
        $this->user = $user;
        return $this;
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
