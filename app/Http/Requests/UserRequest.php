<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Rules\UserRole;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'login' => [
            'bail',
            'required',
            'string',
            'max:50',
            Rule::unique('users')->ignore($this->route('user')),
            ],
            'name' => [
                        'bail',
            'required',
            'string',
            'max:50',
],
            'email' => [
                        'bail',
            'required',
            'string',
            'email',
            'max:50',
            'unique' => Rule::unique('users')->ignore($this->route('user')),
],
'avatar' => [
'mimes:jpeg,jpg,png',
'max:5000',
],
'role_id' => [
'bail',
'required',
'integer',
new UserRole()
],
        ];
    }
    public function messages()
    {
        return [
                'login.required' => trans('users/validation.login.required'),
                'login.string' => trans('users/validation.login.string'),
        'login.max' => trans('users/validation.login.max'),
        'login.unique' => trans('users/validation.login.unique'),
// name
        'name.required' => trans('users/validation.name.required'),
                'name.string' => trans('users/validation.name.string'),
        'name.max' => trans('users/validation.name.max'),
        // email
        'email.required' => trans('users/validation.email.required'),
                'email.string' => trans('users/validation.email.string'),
                                'email.email' => trans('users/validation.email.email'),
        'email.max' => trans('users/validation.email.max'),
        'email.unique' => trans('users/validation.email.unique'),
// password
        'password.required' => trans('users/validation.password.required'),
                'password.string' => trans('users/validation.password.string'),
        'password.max' => trans('users/validation.password.max'),
// avatar
        'avatar.mimes' => trans('users/validation.avatar.mimes'),
                'avatar.max' => trans('users/validation.avatar.max'),
// role_id
        'role_id.required' => trans('users/validation.role_id.required'),
                'role_id.integer' => trans('users/validation.role_id.integer'),
        ];
    }
}
