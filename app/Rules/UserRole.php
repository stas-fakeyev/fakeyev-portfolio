<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Role;

class UserRole implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $roles = [];
    public function __construct()
    {
        //
        $role = Role::all();
        $this->roles = $role->modelKeys();
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        return in_array($value, $this->roles);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('users/validation.role_id.support');
    }
}
