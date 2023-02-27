<?php

namespace App\View\Components\Header;

use Illuminate\View\Component;

use App\Helpers\EnqueueScripts;

class Styles extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
	 public $styles;
	 public $scripts;
	 
    public function __construct(EnqueueScripts $enqueueScripts)
    {
        //
		if (count( $enqueueScripts->header['styles'] ) > 0) {
			$this->styles = $enqueueScripts->header['styles'];
		}
		if( count( $enqueueScripts->header['scripts'] ) > 0) {
			$this->scripts = $enqueueScripts->header['scripts'];
		}
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header.styles');
    }
}
