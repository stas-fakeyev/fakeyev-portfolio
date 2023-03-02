<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\Language;

class PostRequest extends FormRequest
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
                                    'title' => [
            'bail',
            'required',
            'string',
            'max:60',
            Rule::unique('posts')->ignore($this->route('post')),
            ],
                                    'slug' => [
                                    'nullable',
            'string',
            'max:100',
            Rule::unique('posts')->ignore($this->route('post')),
            ],
                                    'text' => [
            'bail',
            'required',
            'string',
            'max:50000',
            ],
'image' => [
'mimes:jpeg,jpg,png',
'max:5000',
],
'language' => [
'bail',
'required',
'string',
'max:2',
new Language()],
'category_id' => [
'required',
'integer',
            Rule::exists('categories', 'id'),
],
        ];
    }
    public function messages()
    {
        return [
                        'title.required' => trans('posts/validation.title.required'),
                'title.string' => trans('posts/validation.title.string'),
        'title.max' => trans('posts/validation.title.max'),
        'title.unique' => trans('posts/validation.title.unique'),

                        'slug.string' => trans('posts/validation.slug.string'),
        'slug.max' => trans('posts/validation.slug.max'),

        'text.required' => trans('posts/validation.text.required'),
                'text.string' => trans('posts/validation.text.string'),
        'text.max' => trans('posts/validation.text.max'),

        'image.mimes' => trans('posts/validation.image.mimes'),
                'image.max' => trans('posts/validation.image.max'),

        'language.required' => trans('posts/validation.language.required'),
                'language.string' => trans('posts/validation.language.string'),
        'language.max' => trans('posts/validation.language.max'),
// category_id
                        'category_id.required' => trans('posts/validation.category_id.required'),
                        'category_id.integer' => trans('posts/validation.category_id.integer'),
                                'category_id.exists' => trans('posts/validation.category_id.exists'),

        ];
    }
}
