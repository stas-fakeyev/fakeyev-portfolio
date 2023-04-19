<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommentRequest extends FormRequest
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
        $rules = [];

        $rules['name'] = ['nullable', 'string', 'max:50'];
        $rules['email'] = ['nullable', 'email', 'max:50'];
        $rules['text'] = ['bail', 'required', 'string', 'max:50000'];
        $rules['commentable_id'] = ['required', 'integer'];
        $rules['commentable_type'] = ['required', 'string'];

        if ($this->input('parent_id')) {
            $rules['parent_id'] = ['integer', Rule::exists('comments', 'id')];
        }
        return $rules;
    }
    public function messages()
    {
        return [
                        'name.string' => trans('comments/validation.name.string'),
                                'name.max' => trans('comments/validation.name.max'),
                        // email
                        'email.email' => trans('comments/validation.email.email'),
        'email.max' => trans('comments/validation.email.max'),
// text
                        'text.required' => trans('comments/validation.text.required'),
                        'text.string' => trans('comments/validation.text.string'),
                                'text.max' => trans('comments/validation.text.max'),
// commentable_id
                        'commentable_id.required' => trans('comments/validation.commentable_id.required'),
                        'commentable_id.integer' => trans('comments/validation.commentable_id.integer'),
                                                'commentable_type.required' => trans('comments/validation.commentable_type.required'),
                        'commentable_type.string' => trans('comments/validation.commentable_type.string'),
// parent_id
                                'parent_id.integer' => trans('comments/validation.parent_id.integer'),
                                                                'parent_id.exists' => trans('comments/validation.parent_id.exists'),
        ];
    }
}
