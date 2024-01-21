<?php

namespace App\Repositories;

use App\Dto\Repositories\ArticleMultfilm\CountArticleMultfilmListRepositoriesInput;
use App\Dto\Repositories\ArticleMultfilm\FirstCreateArticleRepositoryInput;
use App\Dto\Repositories\ArticleMultfilm\FirstCreateArticleRepositoryOutput;
use App\Dto\Repositories\ArticleMultfilm\GetArticleMultfilmListRepositoriesInput;
use App\Dto\Repositories\ArticleMultfilm\GetArticleMultfilmListRepositoriesOutput;
use App\Models\ArticleMultfilm;
use App\Repositories\Interfaces\IArticleMultfilmRepository;
use Illuminate\Database\Eloquent\Collection;

class ArticleMultfilmRepository implements IArticleMultfilmRepository
{

    public function firstCreateArticle(
        FirstCreateArticleRepositoryInput $input
    ): FirstCreateArticleRepositoryOutput {
        /** @var ArticleMultfilm $article_mult */
        $article_mult = ArticleMultfilm::query()->create([
            'title' => $input->getTitle(),
            'created' => $input->getPremier(),
            'poster' => $input->getPoster(),
            'user_id' => $input->getUserId(),
            'story' => '{}',
            'history_created_image' => '{}',
            'images' => '{}'
        ]);

        return (new FirstCreateArticleRepositoryOutput())->setArticleMultfilm($article_mult);
    }

    public function getCountArticle(CountArticleMultfilmListRepositoriesInput $input): int
    {
        return ArticleMultfilm::query()->where('user_id', '=', $input->getUserId())->count();
    }

    public function getListArticles(
        GetArticleMultfilmListRepositoriesInput $input
    ): GetArticleMultfilmListRepositoriesOutput {
        $collection = ArticleMultfilm::query()
            ->where('user_id', '=', $input->getUserId())
            ->limit($input->getLimit())
            ->offset($input->getLimit())
            ->orderBy('id', 'desc')
            ->get();

        return (new GetArticleMultfilmListRepositoriesOutput())->setArticlesCollection($collection);
    }
}
