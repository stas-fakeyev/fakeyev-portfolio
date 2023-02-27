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
        return [
											'name' => [
			'nullable',
			'string',
			'max:50',
			],
									'email' => [
									'nullable',
			'email',
			'max:50',
			],
									'text' => [
			'bail',
			'required',
			'string',
			'max:50000',
			],
'post_id' => [
'required',
'integer',
			Rule::exists('posts', 'id'),
],
'parent_id' => [
'present',
'integer',
			Rule::exists('comments', 'id'),
],
            //
        ];
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
// post_id
						'post_id.required' => trans('comments/validation.post_id.required'),
						'post_id.integer' => trans('comments/validation.post_id.integer'),
								'post_id.exists' => trans('comments/validation.post_id.exists'),
// parent_id
								'parent_id.integer' => trans('comments/validation.parent_id.integer'),
																'parent_id.exists' => trans('comments/validation.parent_id.exists'),
		];
	}
}
