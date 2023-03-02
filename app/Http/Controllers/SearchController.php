<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->input('query');
        $query = Post::search($search);
        $posts = $query->paginate(6)->withQueryString();
        return view('search', compact('search', 'posts'));
    }
}
