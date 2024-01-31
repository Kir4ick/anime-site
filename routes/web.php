<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

# Роуты обычных страниц, где нет логики сервера
Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/biography', function () {
    return view('pages.biography');
})->name('biography');

Route::get('/article/{id?}', [\App\Http\Controllers\Articles\ArticlesController::class, 'article'])
    ->name('article');

# Роуты авторизации и регистрации
Route::group(['middleware' => 'guest'], function () {
    # Авторизация
    Route::get('/sign-in', [\App\Http\Controllers\Authorize\SignInController::class, 'page'])
        ->name('sign-in');
    Route::post('/sign-in', \App\Http\Controllers\Authorize\SignInController::class)
        ->name('action_sign-in');

    # Регистрация
    Route::get('/sign-up', [\App\Http\Controllers\Authorize\SignUpController::class, 'page'])
        ->name('sign-up');
    Route::post('/sign-up', \App\Http\Controllers\Authorize\SignUpController::class)
        ->name('action_sign-up');
});

# Роуты авторизированного пользователя
Route::group(['middleware' => 'auth'], function () {
    # Выход из аккаунта
    Route::get('/logout', \App\Http\Controllers\Authorize\LogoutController::class)
        ->name('logout');

    # Роуты админа
    Route::group(['middleware' => 'admin'], function () {
        # Профиль
        Route::get('/profile', [\App\Http\Controllers\Profile\ProfileController::class, 'page'])
            ->name('profile');

        # Статьи, написанные админом
        Route::get('/articles', function () {
            /** @var User $user */
            $user = \Illuminate\Support\Facades\Auth::user();
            $avatar_url = \Illuminate\Support\Facades\Storage::disk('local')->url($user->avatar);
            $nickname = $user->nickname;

            return view('pages.articles', compact('avatar_url', 'nickname'));
        })->name('articles');

        Route::post('/update-gallery/{id}', [
            \App\Http\Controllers\Articles\ArticlesController::class, 'updateArticleGallery'
        ])->name('update-gallery');

        Route::get('/article/{id}/gallery/{image_id}', [
            \App\Http\Controllers\Articles\ArticlesController::class, 'removeImageInArticleGallery'
        ])->name('delete-gallery');

        Route::post('/update-history/{id}', [
            \App\Http\Controllers\Articles\ArticlesController::class,
            'updateArticleHistory'
        ])->name('update-history');

        Route::post('/update-persons/{id}', function ($id) {
            return redirect(route('article', ['id' => $id, 'method' => 'get']));
        })->name('update-persons');

        Route::post('/update-history-created/{id}', [
            \App\Http\Controllers\Articles\ArticlesController::class,
            'updateArticleHistoryCreated'
        ])->name('update-history-created');
    });
});
