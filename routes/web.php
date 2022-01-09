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
});

Route::group(['prefix' => '/books'], function () {
    Route::get('/', [BookController::class, 'index'])
        ->name('books');

    Route::get('/create', [BookController::class, 'create'])
        ->name('books.create');
});
