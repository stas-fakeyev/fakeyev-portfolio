<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;

use LaravelLocalization;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$posts = Post::where('language', LaravelLocalization::getCurrentLocale())->get();
		return view('posts.index', compact('posts'));
    }
public function category(Category $category)
{
			$posts = Post::where('category_id', $category->id)->get();
		return view('posts.index', compact('posts'));

}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
		$post->load('comments');
		$recentPosts = Post::where('id', '!=', $post->id)->where('language', LaravelLocalization::getCurrentLocale())->skip(0)->take(4)->orderBy('created_at', 'DESC')->get();
		
		$archivePosts = DB::table('posts')->select('month', 'year', 'month_name')->distinct()->where('language', LaravelLocalization::getCurrentLocale())->get();
		
		$comments = Comment::where('post_id', $post->id)->where('parent_id', 0)->latest('created_at')->paginate(1);
		
		$comments->load('user');
		$categories = Category::withCount('posts')->where('language', LaravelLocalization::getCurrentLocale())->latest('created_at')->skip(0)->take(4)->get();
		return view('posts.show', compact('post', 'recentPosts', 'comments', 'categories', 'archivePosts'));
    }
public function archive($month, $year)
{
			$posts = Post::where('month', $month)->where('year', $year)->where('language', LaravelLocalization::getCurrentLocale())->orderBy('created_at', 'DESC')->get();
			if (count($posts) == 0) abort(404);
			
return view('posts.archive', compact('posts'));
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
