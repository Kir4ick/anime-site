<?php

namespace App\Http\Operations\Interfaces;

use App\Dto\Operations\Article\FirstCreateArticleOperationInput;
use App\Dto\Operations\Article\FirstCreateArticleOperationOutput;
use App\Dto\Operations\Article\GetArticleMultfilmListOperationInput;
use App\Dto\Operations\Article\GetArticleMultfilmListOperationOutput;
use App\Models\Article;
use Illuminate\Http\UploadedFile;

interface IArticlesOperations
{
    public function firstCreateArticleMultfilm(
        FirstCreateArticleOperationInput $input
    ): FirstCreateArticleOperationOutput;

    public function getMultfilmList(
        GetArticleMultfilmListOperationInput $input
    ): GetArticleMultfilmListOperationOutput;

    public function updateStoryInArticle(
        int $article_id,
        string $story_first,
        string $story_second,
        string $story_bottom,
        UploadedFile $image
    ): Article;
}
