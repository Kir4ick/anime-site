<?php

namespace App\Repositories;

use App\Dto\Repositories\Article\CountArticleMultfilmListRepositoriesInput;
use App\Dto\Repositories\Article\FirstCreateArticleRepositoryInput;
use App\Dto\Repositories\Article\FirstCreateArticleRepositoryOutput;
use App\Dto\Repositories\Article\GetArticleMultfilmListRepositoriesInput;
use App\Dto\Repositories\Article\GetArticleMultfilmListRepositoriesOutput;
use App\Dto\Repositories\Article\UpdateArticleMultfilmRepositoriesInput;
use App\Dto\Repositories\Article\UpdateArticleMultfilmRepositoriesOutput;
use App\Models\Article;
use App\Repositories\Interfaces\IArticleRepository;

class ArticleRepository implements IArticleRepository
{

    public function firstCreateArticle(
        FirstCreateArticleRepositoryInput $input
    ): FirstCreateArticleRepositoryOutput {
        /** @var Article $article_mult */
        $article_mult = Article::query()->create([
            'title' => $input->getTitle(),
            'created' => $input->getPremier(),
            'poster' => $input->getPoster(),
            'user_id' => $input->getUserId(),
            'story' => '{}',
            'history_created_image' => '{}',
            'history_created' => '',
            'images' => '{}'
        ]);

        return (new FirstCreateArticleRepositoryOutput())->setArticleMultfilm($article_mult);
    }

    public function getCountArticle(CountArticleMultfilmListRepositoriesInput $input): int
    {
        return Article::query()->where('user_id', '=', $input->getUserId())->count();
    }

    public function getListArticles(
        GetArticleMultfilmListRepositoriesInput $input
    ): GetArticleMultfilmListRepositoriesOutput {
        $request = Article::query()
            ->limit($input->getLimit())
            ->offset($input->getOffset())
            ->orderBy('id', 'desc');

        if ($input->getUserId() !== null) {
            $request->where('user_id', '=', $input->getUserId());
        }

        $collection = $request->get();

        return (new GetArticleMultfilmListRepositoriesOutput())->setArticlesCollection($collection);
    }

    public function updateArticle(
        UpdateArticleMultfilmRepositoriesInput $input
    ): UpdateArticleMultfilmRepositoriesOutput {
        $request = Article::query()->where('id', '=', $input->getArticleId());
        $updated_array = [];

        if ($input->getStory() != null) {
            $updated_array['story'] = $input->getStory();
        }

        if ($input->getHistoryCreated() != null) {
            $updated_array['history_created'] = $input->getHistoryCreated();
        }

        if ($input->getStoryImage() != null) {
            $updated_array['story_image'] = $input->getStoryImage();
        }

        if ($input->getImages() != null) {
            $updated_array['images'] = $input->getImages();
        }

        $request->update($updated_array);
        $result = Article::query()->find($input->getArticleId());

        return (new UpdateArticleMultfilmRepositoriesOutput())->setArticleMultfilm($result);
    }
}
