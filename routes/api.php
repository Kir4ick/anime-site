<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::group(['middleware' => 'auth'], function () {
    Route::post(
        '/article-multfilm',
        [\App\Http\Controllers\RestApi\ArtcleMultfilmController::class, 'firstCreate']
    )->name('create-article');

    Route::get(
        '/article-list',
        [\App\Http\Controllers\RestApi\ArtcleMultfilmController::class, 'list']
    )->name('list-article');

    Route::group([], function () {
        Route::post('', [\App\Http\Controllers\RestApi\CharacterController::class, 'create'])
            ->name('character-create');
        Route::delete('/{id}', [\App\Http\Controllers\RestApi\CharacterController::class, 'remove'])
            ->name('character-remove');
        Route::patch('/{id}', [\App\Http\Controllers\RestApi\CharacterController::class, 'update'])
            ->name('character-update');
        Route::get('', [\App\Http\Controllers\RestApi\CharacterController::class, 'list'])
            ->name('character-list');
        Route::get('/{id}', [\App\Http\Controllers\RestApi\CharacterController::class, 'one'])
            ->name('character-one');
    })->prefix('/character');

    Route::post('/rate', [\App\Http\Controllers\RestApi\RateController::class, 'create'])
        ->name('rate-create');
    Route::patch('/update', [\App\Http\Controllers\RestApi\RateController::class, 'update'])
        ->name('rate-update');
});
