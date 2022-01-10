<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublisherController;
use App\Models\Publisher;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::group(['prefix' => '/authors'], function () {
    Route::get('/', [AuthorController::class, 'index'])
        ->name('authors');
    Route::get('/create', [AuthorController::class, 'create'])
        ->name('authors.create');
    Route::post('create', [AuthorController::class, 'store'])
        ->name('authors.store');
    Route::get('{author}/edit', [AuthorController::class, 'edit'])
        ->name('authors.edit');
    Route::post('{author}', [AuthorController::class, 'update'])
        ->name('authors.update');
});

Route::group(['prefix' => '/publishers'], function () {
    Route::get('/', [PublisherController::class, 'index'])
        ->name('publishers');
    Route::get('/create', [PublisherController::class, 'create'])
        ->name('publishers.create');
    Route::post('create', [PublisherController::class, 'store'])
        ->name('publishers.store');
    Route::get('{publisher}/edit', [PublisherController::class, 'edit'])
        ->name('publishers.edit');
    Route::post('{publisher}', [PublisherController::class, 'update'])
        ->name('publishers.update');

});

Route::group(['prefix' => '/books'], function () {
    Route::get('/', [BookController::class, 'index'])
    ->name('books');
    Route::get('/create', [BookController::class, 'create'])
        ->name('books.create');
    Route::post('create', [BookController::class, 'store'])
        ->name('books.store');
    Route::get('{book}/edit', [BookController::class, 'edit'])
        ->name('books.edit');
    Route::post('{book}', [BookController::class, 'update'])
        ->name('books.update');
});

//API
Route::group(['prefix' => '/api'], function () {
    Route::group(['prefix' => '/authors'], function () {
        Route::get('/', [AuthorController::class, 'indexApi'])
            ->name('authorsApi');
        Route::delete('/destroy/{authorId}', [AuthorController::class, 'destroy'])
            ->name('authors.destroy');
    });
    Route::group(['prefix' => '/publishers'], function () {
        Route::get('/', [PublisherController::class, 'indexApi'])
            ->name('publishersApi');
        Route::delete('/destroy/{publisherId}', [PublisherController::class, 'destroy'])
            ->name('publishers.destroy');
    });
    Route::group(['prefix' => '/books'], function () {
        Route::get('/', [BookController::class, 'indexApi'])
            ->name('booksApi');
        Route::delete('/destroy/{bookId}', [BookController::class, 'destroy'])
            ->name('books.destroy');
    });
});
