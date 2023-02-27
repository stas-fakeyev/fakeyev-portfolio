<?php

namespace App\View\Components\Footer;

use Illuminate\View\Component;
use Config;

class Contacts extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
	 public $contacts = [];
    public function __construct()
    {
        //
		$this->contacts['address'] = Config::get('settings.address');
				$this->contacts['phone'] = Config::get('settings.phone');
		$this->contacts['fax'] = Config::get('settings.fax');
		$this->contacts['email'] = Config::get('settings.email');

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.footer.contacts');
    }
}
