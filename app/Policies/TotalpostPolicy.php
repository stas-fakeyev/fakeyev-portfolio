<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Totalpost;

use Illuminate\Auth\Access\HandlesAuthorization;

class TotalpostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
	    public function viewAny(User $user)
    {
        //
				return $user->role->name === 'administrator' || $user->role->name === 'editor';
    }
    public function create(User $user)
    {
        //
				return $user->role->name === 'administrator' || $user->role->name === 'editor';
    }
    public function restore(User $user, Totalpost $totalpost)
    {
        //
				return $user->role->name === 'administrator' || $user->role->name === 'editor';
    }
    public function forceDelete(User $user, Totalpost $totalpost)
    {
        //
				return $user->role->name === 'administrator' || $user->role->name === 'editor';
    }

}
