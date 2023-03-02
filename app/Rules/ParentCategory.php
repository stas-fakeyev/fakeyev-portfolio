<?php

namespace App\Rules;

use App\Models\Category;

use Illuminate\Contracts\Validation\Rule;

class ParentCategory implements Rule
{
    private $category;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Category $category)
    {
        //
        $this->category = $category;
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
        return $this->category->validParent($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('categories/validation.parent');
    }
}
