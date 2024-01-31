<?php

namespace App\Http\Controllers\Articles;

use App\Http\Controllers\Controller;
use App\Http\Operations\Interfaces\IArticlesOperations;
use App\Models\Article;
use \Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{

    public function __construct(
        private readonly IArticlesOperations $operations
    ){}

    public function article($id)
    {
        $article = Article::query()->find($id);

        if ($article == null) {
            return redirect(route('index'));
        }

        $auth = Auth::user();
        $is_this_user_created = !($auth == null) && $article->user_id == $auth->getAuthIdentifier();
        if (!$is_this_user_created) {
            return view('pages.article', compact('article'));
        }

        return view('pages.admin.article', compact('article'));
    }

    public function updateArticleHistory(int $id, Request $request)
    {
        $this->operations->updateStoryInArticle(
            $id,
            $request->story_first,
            $request->story_second,
            $request->story_bottom,
            $request->file('story_image')
        );

        return redirect(route('article', ['id' => $id, 'method' => 'get']));
    }

    public function updateArticleGallery(int $id, Request $request)
    {
        $file = $request->file('gallery');
        $file_path = $file->store('/gallery');

        $article = Article::query()->find($id);
        $gallery = $article->images;
        $gallery = json_decode($gallery, true);
        $gallery[] = $file_path;

        $article->images = $gallery;
        $article->save();

        return redirect(route('article', ['id' => $id, 'method' => 'get']));
    }

    public function removeImageInArticleGallery(int $id, int $image_key) {
        $article = Article::query()->find($id);
        $gallery = $article->images;
        $gallery = json_decode($gallery, true);

        $new_gallery = [];
        foreach ($gallery as $key => $image) {
            if ($key == $image_key) {
                continue;
            }

            $new_gallery[] = $image;
        }

        $article->images = $new_gallery;
        $article->save();
        return redirect(route('article', ['id' => $id, 'method' => 'get']).'#gallery');
    }

    public function updateArticleHistoryCreated(int $id, Request $request)
    {
        /** @var Article $article */
        $article = Article::query()->find($id);

        $history_created = [];
        $history_created['paragraph'] = $request->paragraph;

        $file = $request->file('story_image');
        $file_path = $file->store('/story');

        $article->history_created = json_encode($history_created);
        $article->history_created_image = json_encode([$file_path]);

        $article->save();

        return redirect(route('article', ['id' => $id, 'method' => 'get']));
    }

    public function updateArticlePersons(int $id)
    {

        return redirect(route('article', ['id' => $id, 'method' => 'get']));
    }

}
