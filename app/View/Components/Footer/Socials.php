<?php

namespace App\View\Components\Footer;

use Illuminate\View\Component;
use Config;
class Socials extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
	 public $links = [];
    public function __construct()
    {
        //
		$this->links['facebook'] = Config::get('settings.facebook');
				$this->links['twitter'] = Config::get('settings.twitter');
		$this->links['instagram'] = Config::get('settings.instagram');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.footer.socials');
    }
}
