<?php

namespace App\Providers;

use App\Http\Operations\Interfaces\IUserOperations;
use App\Http\Operations\UserOperations;
use App\Repositories\Interfaces\IUserRepository;
use App\Repositories\UserRepository;
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

        # Operations
        $this->app->bind(IUserOperations::class, UserOperations::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
