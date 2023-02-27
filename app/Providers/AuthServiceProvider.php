<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\Slider;
use App\Models\Totalpost;
use App\Models\Totalcategory;

use App\Policies\SliderPolicy;
use App\Policies\UserPolicy;
 use App\Policies\TotalpostPolicy;
 use App\Policies\TotalcategoryPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
		Slider::class => SliderPolicy::class,
		User::class => UserPolicy::class,
				Totalpost::class => TotalpostPolicy::class,
				Totalcategory::class => TotalcategoryPolicy::class,

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

Gate::define('access-adminpanel', function ($user) {
	return $user->role->name != 'custommer';
});

// check update, delete, edit the post
Gate::define('edit-post', function($user){
				return $user->role->name === 'administrator' || $user->role->name === 'editor';
});
Gate::define('update-post', function($user){
				return $user->role->name === 'administrator' || $user->role->name === 'editor';
});
Gate::define('destroy-post', function($user){
				return $user->role->name === 'administrator' || $user->role->name === 'editor';
});

// check update, delete, edit the category
Gate::define('edit-category', function($user){
				return $user->role->name === 'administrator' || $user->role->name === 'editor';
});
Gate::define('update-category', function($user){
				return $user->role->name === 'administrator' || $user->role->name === 'editor';
});
Gate::define('destroy-category', function($user){
				return $user->role->name === 'administrator' || $user->role->name === 'editor';
});

        //
    }
}
