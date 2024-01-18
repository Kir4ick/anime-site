<?php

use Illuminate\Support\Facades\Route;

# Роуты обычных страниц, где нет логики сервера
Route::get('/', function () {
    return view('welcome');
})->name('index');

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

    Route::group(['middleware' => 'admin'], function () {
        # Профиль
        Route::get('/profile', [\App\Http\Controllers\Profile\ProfileController::class, 'page'])
            ->name('profile');
    });
});
