<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property-read $id
 * @property $title
 * @property $poster
 * @property $created
 * @property $story
 * @property $story_image
 * @property $history_created
 * @property $history_created_image
 * @property $images
 * @property $user_id
 * @property User $user
 */
class ArticleMultfilm extends Model
{
    protected $table = 'articles_multfilms';

    protected $fillable = [
        'title',
        'poster',
        'created',
        'story',
        'story_image',
        'history_created',
        'history_created_image',
        'images',
        'user_id',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
