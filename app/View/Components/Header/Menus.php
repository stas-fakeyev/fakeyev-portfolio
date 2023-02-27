<?php

namespace App\View\Components\Header;

use Illuminate\View\Component;
use LaravelLocalization;
use App\Helpers\MenuHelper;

use App\Models\Post;

class Menus extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
	 public $posts;
	 public $menu;
    public function __construct()
    {
        //
		$this->posts = Post::where('language', LaravelLocalization::getCurrentLocale())->get();
		$menuHelper = new MenuHelper();
		$this->menu = $menuHelper->menu;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header.menus');
    }
}
