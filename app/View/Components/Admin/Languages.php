<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;
use LaravelLocalization;

class Languages extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
	 public $currentLanguage = [];
    public function __construct()
    {
		$currentLocale = LaravelLocalization::getCurrentLocale();
		$properties = LaravelLocalization::getSupportedLocales();
		$this->currentLanguage = ['code' => $currentLocale, 'flag' => $properties[$currentLocale]['flag'], 'native' => $properties[$currentLocale]['native']];
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.languages');
    }
}
