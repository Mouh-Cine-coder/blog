<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Article;
use App\Models\User;

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

Route::get('/', function () {
    $articles = Article::with('tags', 'category', 'user:id,name')->latest()->get();

    $users = DB::table('users')->where('id', '<>', Auth::id())->distinct()->get();

    return Inertia::render('Home', [
        'users' => $users,
        'canRegister' => Route::has('register'),
        'canLogin' => Route::has('login'),
    ]);
})->name('Home');

Route::get('blogger/{username}', function (string $username) {
    return Inertia::render('UserSpace');
})->name('userspace');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard/Index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::prefix('dashboard')->group(function () {
    Route::resource('articles', ArticleController::class);

})->middleware(['auth']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
