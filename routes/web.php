<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BloggerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


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

Route::get('/', [BloggerController::class, 'index'])->name('Home');

Route::get('blogger/{id}/', [BloggerController::class, 'show'])->name('blogger.show');


Route::middleware('auth')->group(function () {

    Route::get('blogger/{id}/posts', [ArticleController::class, 'showUserArticles'])->name('userArticles');
    Route::get('blogger/{id}/create-article', [ArticleController::class, 'create'])->name('createArticle');
    Route::get('blogger/{id}/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('blogger/{id}/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('blogger/{id}/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
