<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\User;
use App\Models\Newspaper;

use LaravelLocalization;

class HomeController extends Controller
{
    //
    public function index()
    {
        $sliders = Slider::where('language', LaravelLocalization::getCurrentLocale())->get();

        // get newspapers
        $newspapers = Newspaper::latest()->skip(0)->take(3)->get();

        // get 12 custommers
        $users = User::where('role_id', 4)->skip(0)->take(12)->get();

        return view('home', compact('sliders', 'newspapers', 'users'));
    }
}
