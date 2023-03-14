<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class NewspaperRequest extends FormRequest
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
            Rule::unique('newspapers')->ignore($this->route('newspaper')),
            ],
            'url' => [
            'bail',
            'required',
            'string',
            'max:100',
            Rule::unique('newspapers')->ignore($this->route('newspaper')),
            ],
        ];
    }
    public function messages()
    {
        return [
        'title.required' => trans('newspapers/validation.title.required'),
        'title.string' => trans('newspapers/validation.title.string'),
        'title.max' => trans('newspapers/validation.title.max'),
        'title.unique' => trans('newspapers/validation.title.unique'),
        // url
        'url.required' => trans('newspapers/validation.url.required'),
        'url.string' => trans('newspapers/validation.url.string'),
        'url.max' => trans('newspapers/validation.url.max'),
        'url.unique' => trans('newspapers/validation.url.unique'),
];
    }
}
