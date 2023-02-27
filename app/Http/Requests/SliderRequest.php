<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Language;
use Illuminate\Validation\Rule;

class SliderRequest extends FormRequest
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
			'max:50',
			Rule::unique('sliders')->ignore($this->route('slider')),
			],
						'subtitle' => [
						'bail',
						'required',
						'string',
						'max:90',
						Rule::unique('sliders')->ignore($this->route('slider')),
						],
						'background' => [
						'mimes:jpeg,jpg,png',
						'max:5000'
						],
'slide' => [
'mimes:jpeg,jpg,png',
'max:5000'
],
'language' => [
'bail',
'required',
'string',
'max:2',
new Language],
        ];
    }
	
	public function messages(){
		return [
		'title.required' => trans('home-slider/validation.title.required'),
				'title.string' => trans('home-slider/validation.title.string'),
		'title.max' => trans('home-slider/validation.title.max'),
		'title.unique' => trans('home-slider/validation.title.unique'),
// subtitle
		'subtitle.required' => trans('home-slider/validation.subtitle.required'),
				'subtitle.string' => trans('home-slider/validation.subtitle.string'),
		'subtitle.max' => trans('home-slider/validation.subtitle.max'),
		'subtitle.unique' => trans('home-slider/validation.subtitle.unique'),
// background
		'background.mimes' => trans('home-slider/validation.background.mimes'),
				'background.max' => trans('home-slider/validation.background.max'),
// slide
		'slide.mimes' => trans('home-slider/validation.slide.mimes'),
				'slide.max' => trans('home-slider/validation.slide.max'),
// language
		'language.required' => trans('home-slider/validation.language.required'),
				'language.string' => trans('home-slider/validation.language.string'),
		'language.max' => trans('home-slider/validation.language.max'),

		];
	}
}
