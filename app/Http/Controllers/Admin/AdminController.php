<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
   * the Main page of the admin panel
   */
    public function index()
    {
        return view('admin.index');
    }
}
