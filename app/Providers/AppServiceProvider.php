<?php

namespace App\Providers;

use App\Http\Operations\ArticleOperations;
use App\Http\Operations\Interfaces\IArticlesOperations;
use App\Http\Operations\Interfaces\IUserOperations;
use App\Http\Operations\UserOperations;
use App\Repositories\ArticleMultfilmRepository;
use App\Repositories\Interfaces\IArticleMultfilmRepository;
use App\Repositories\Interfaces\IUserRepository;
use App\Repositories\UserRepository;
use App\Services\ImageLoader\ImageBase64Loader;
use App\Services\ImageLoader\Interfaces\IImageLoader;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        # Repositories
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IArticleMultfilmRepository::class, ArticleMultfilmRepository::class);

        # Operations
        $this->app->bind(IUserOperations::class, UserOperations::class);
        $this->app->bind(IArticlesOperations::class, ArticleOperations::class);

        # Services
        $this->app->bind(IImageLoader::class, ImageBase64Loader::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
