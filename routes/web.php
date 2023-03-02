<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeCookieRedirect', 'localizationRedirect' ]], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::controller(PostController::class)->group(function () {
        Route::get('posts/category/{category:slug}', 'category')->name('posts.category')->where(['category' => '[a-zA-Z0-9_-]+']);
        Route::get('posts/archive/{month}/{year}', 'archive')->name('posts.archive')->whereNumber('month')->whereNumber('year');
        Route::get('posts/{post:slug}', 'show')->name('posts.show')->where(['post' => '[a-zA-Z0-9_-]+']);
    });

    Route::resource('posts', PostController::class)->only(['index']);
    Route::resource('comments', CommentController::class)->only(['index', 'store']);
    Route::get('comments/like/{comment}', [CommentController::class, 'like'])->middleware(['auth'])->name('comments.like');
    Route::get('comments/dizlike/{comment}', [CommentController::class, 'dizlike'])->middleware(['auth'])->name('comments.dizlike');
    Route::get('search', [SearchController::class, 'index'])->name('search');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    require __DIR__.'/auth.php';
});
