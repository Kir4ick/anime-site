<?php

namespace App\Dto\Repositories\ArticleMultfilm;

use Illuminate\Database\Eloquent\Collection;

class GetArticleMultfilmListRepositoriesOutput
{
    private Collection $articles_collection;

    /**
     * @return Collection
     */
    public function getArticlesCollection(): Collection
    {
        return $this->articles_collection;
    }

    /**
     * @param Collection $articles_collection
     * @return GetArticleMultfilmListRepositoriesOutput
     */
    public function setArticlesCollection(Collection $articles_collection): GetArticleMultfilmListRepositoriesOutput
    {
        $this->articles_collection = $articles_collection;
        return $this;
    }

}
