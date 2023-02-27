<?php

namespace App\View\Components\Footer;
use App\Helpers\MenuHelper;


use Illuminate\View\Component;

class Menus extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
	 public $menu;

    public function __construct()
    {
        //
		$menuHelper = new MenuHelper();
		$this->menu = $menuHelper->footerMenu();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.footer.menus');
    }
}
