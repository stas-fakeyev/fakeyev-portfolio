<?php

namespace App\Policies;

use App\Models\Newspaper;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NewspaperPolicy
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
        return $user->role->name === 'administrator' || $user->role->name === 'editor';
    }
    public function create(User $user)
    {
        return $user->role->name === 'administrator' || $user->role->name === 'editor';
    }
    public function update(User $user, Newspaper $newspaper)
    {
        return $user->role->name === 'administrator' || $user->role->name === 'editor';
    }
    public function delete(User $user, Newspaper $newspaper)
    {
        return $user->role->name === 'administrator' || $user->role->name === 'editor';
    }
}
