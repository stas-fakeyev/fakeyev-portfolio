<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\Language;
use App\Rules\ParentCategory;

class CategoryRequest extends FormRequest
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
		$rules['title'] = [
			'bail',
			'required',
			'string',
			'max:60',
			Rule::unique('categories')->ignore($this->route('category')),
			];
									$rules['slug'] = [
									'nullable',
			'string',
			'max:70',
			Rule::unique('categories')->ignore($this->route('category')),
			];
			$rules['language'] = [
'bail',
'required',
'string',
'max:2',
new Language];

			$rules['parent_id'] = [
'present',
'integer',
];
if (!is_null($this->input('parent_id')) && $this->input('parent_id') > 0){
	$rules['parent_id'][] = Rule::exists('categories', 'id');
}
if ($this->method() === 'PUT'){
	$model = $this->route('category');
	$rules['parent_id'][] = new ParentCategory($model);
}
        return $rules;
    }
		public function messages()
	{
		return [
						'title.required' => trans('categories/validation.title.required'),
				'title.string' => trans('categories/validation.title.string'),
		'title.max' => trans('categories/validation.title.max'),
		'title.unique' => trans('categories/validation.title.unique'),
		
						'slug.string' => trans('categories/validation.slug.string'),
		'slug.max' => trans('categories/validation.slug.max'),
// parent_id
								'parent_id.integer' => trans('categories/validation.parent_id.integer'),
																'parent_id.exists' => trans('categories/validation.parent_id.exists'),
		'language.required' => trans('categories/validation.language.required'),
				'language.string' => trans('categories/validation.language.string'),
		'language.max' => trans('categories/validation.language.max'),

		];
	}

}
