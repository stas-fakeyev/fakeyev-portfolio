<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeCookieRedirect', 'localizationRedirect' ]], function () {
    Route::name('admin.')->prefix('admin')->middleware('auth', 'admin')->group(function () {
        Route::get('index/', [AdminController::class, 'index'])->name('index');

        Route::resource('sliders', SliderController::class)->except(['show']);

        Route::resource('users', UserController::class)->except(['show']);

        Route::controller(UserController::class)->group(function () {
            Route::get('users/trash', 'trash')->name('users.trash');
            Route::post('users/restore/{user}', 'restore')->withTrashed()->name('users.restore');
            Route::delete('users/force-delete/{user}', 'forceDelete')->withTrashed()->name('users.force-delete');
        });

        // crut on posts
        Route::resource('posts', PostController::class)->except(['show', 'create', 'store'])->whereNumber('post');

        Route::controller(PostController::class)->group(function () {
            Route::get('posts/trash', 'trash')->name('posts.trash');
            Route::post('posts/restore/{totalpost}', 'restore')->withTrashed()->name('posts.restore')->whereNumber('totalpost');
            Route::delete('posts/force-delete/{totalpost}', 'forceDelete')->withTrashed()->name('posts.force-delete')->whereNumber('totalpost');
            Route::get('posts/create/{totalpost?}', 'create')->name('posts.create')->whereNumber('totalpost');
            Route::post('posts/store/{totalpost?}', 'store')->name('posts.store')->whereNumber('totalpost');
        });

        // crut of categories
        Route::resource('categories', CategoryController::class)->except(['show', 'create', 'store'])->whereNumber('category');
        Route::controller(CategoryController::class)->group(function () {
            Route::get('categories/trash', 'trash')->name('categories.trash');
            Route::post('categories/restore/{totalcategory}', 'restore')->withTrashed()->name('categories.restore');
            Route::delete('categories/force-delete/{totalcategory}', 'forceDelete')->withTrashed()->name('categories.force-delete');
            Route::get('categories/create/{totalcategory?}', 'create')->name('categories.create');
            Route::post('categories/store/{totalcategory?}', 'store')->name('categories.store');
        });
    });
});
