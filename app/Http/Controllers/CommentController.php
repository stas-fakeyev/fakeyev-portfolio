<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

use App\Models\Comment;
use App\Models\Post;

use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
		$post = Post::findOrFail($request->get('post_id'));
		$comments = Comment::where('post_id', $post->id)->where('parent_id', 0)->latest('created_at')->paginate(1);
$comments->load('user');

		if ($request->ajax()){
		$content = view('posts.comment', compact('comments'))->render();
		$pagination = view('posts.pagination', compact('comments', 'post'))->render();
				return response()->json(['status' => 'success', 'data' => $content, 'pagination' => $pagination]);

		}
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
    public function store(CommentRequest $request)
    {
        //
		$data = $request->safe()->all();
		
		if ($data['parent_id'])
		{
			$parent = Comment::findOrFail($data['parent_id']);
		}

		$comment = new Comment($data);
		
		$user = Auth::user();
		if ($user)
		{
			$comment->user_id = $user->id;
			$comment->name = $user->name;
			$comment->email = $user->email;
		}
		
		$post = Post::findOrFail($data['post_id']);
		$post->comments()->save($comment);
		
							    session()->flash('message', trans('comments/flash.comment-store'));
return to_route('posts.show', ['post' => $post->id]);

    }
	public function like(Comment $comment)
	{
		$comment->likes += 1;
		$comment->save();
		
		
		return response()->json(['status' => 'success', 'id' => $comment->id, 'data' => $comment->getAmount()]);
	}
		public function dizlike(Comment $comment)
	{
		$comment->dizlikes += 1;
		$comment->save();
		
		
		return response()->json(['status' => 'success', 'id' => $comment->id, 'data' => $comment->getAmount()]);
	}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
