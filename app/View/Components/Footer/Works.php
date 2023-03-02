<?php

namespace App\View\Components\Footer;

use Illuminate\View\Component;
use App\Models\Post;
use LaravelLocalization;

class Works extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $work;

    public function __construct()
    {
        //
        $this->work = Post::where('language', LaravelLocalization::getCurrentLocale())->latest()->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.footer.works');
    }
}
