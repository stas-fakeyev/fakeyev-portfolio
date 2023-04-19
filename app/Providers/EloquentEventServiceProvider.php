<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Category;

use App\Observers\UserObserver;
use App\Observers\CategoryObserver;

use Illuminate\Support\ServiceProvider;

class EloquentEventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        User::observe(UserObserver::class);
        Category::observe(CategoryObserver::class);
    }
}
