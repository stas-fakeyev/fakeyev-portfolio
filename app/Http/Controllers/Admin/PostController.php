<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Models\Totalpost;
use App\Models\Post;
use App\Models\Category;

use App\Helpers\ImageSaver;
use LaravelLocalization;

class PostController extends Controller
{
		private $imageSaver;
	
	public function __construct(ImageSaver $imageSaver)
		{
			$this->imageSaver = $imageSaver;
			$this->authorizeResource(Totalpost::class, 'totalpost');
		}
			     protected function resourceAbilityMap()
    {
        return [
            'index' => 'viewAny',
          'trash' => 'viewAny',
            'show' => 'view',
            'create' => 'create',
            'store' => 'create',
			'restore' => 'restore',
			'forceDelete' => 'forceDelete',
        ];
    }
		    protected function resourceMethodsWithoutModels()
    {
        return ['index', 'create', 'store', 'trash'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
				$totalposts = Totalpost::with(['posts' => function ($query) {
			$query->where('language', LaravelLocalization::getCurrentLocale());
		}])->get();

		return view('admin.posts.index', compact('totalposts'));
    }
public function trash()
{
					$totalposts = Totalpost::with(['posts' => function ($query) {
			$query->where('language', LaravelLocalization::getCurrentLocale());
		}])->onlyTrashed()->get();

		return view('admin.posts.trash', compact('totalposts'));

}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, ?Totalpost $totalpost = null)
    {
        //
		$language = $request->language ?? LaravelLocalization::getCurrentLocale();
		$categories = Category::where('language', $language)->get();
		return view('admin.posts.create', compact('totalpost', 'categories', 'language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, ?Totalpost $totalpost = null)
    {
        //
						        $data = $request->safe()->all();
								if (is_null($totalpost))
								{
						        $totalpostObj = new Totalpost;
								$totalpostObj->save();
								
$data['totalpost_id'] = $totalpostObj->id;
						} //endif
else $data['totalpost_id'] = $totalpost->id;

		$requestImage = $request->file('image');
								if($requestImage){
						$data['image'] = $this->imageSaver->upload($requestImage, null, 'posts');
						}
						else $data['image'] = 'default.png';

$data['user_id'] = auth()->user()->id;

						$date = new \DateTime('NOW');
$data['month'] = $date->format('m');
$data['year'] = $date->format('Y');
$data['month_name'] = $date->format('F');

        $post = new Post;
		$post->fill($data);
		$post->save();
		
					    session()->flash('message', trans('posts/flash.store'));
return to_route('admin.posts.edit', ['post' => $post->id, 'language' => $post->language]);
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
    public function edit(Post $post)
    {
        //
		Gate::authorize('edit-post');
		
		$language = $post->language;
		$translates = $post->where('totalpost_id', $post->totalpost_id)->where('language', '!=', $language)->get();
		$categories = Category::where('language', $language)->get();

		return view('admin.posts.edit', compact('post', 'language', 'translates', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        //
				Gate::authorize('update-post');

						        $data = $request->safe()->all();
								
										$requestImage = $request->file('image');
								if($requestImage){
						$data['image'] = $this->imageSaver->upload($requestImage, $post->image, 'posts');
						}
						else $data['image'] = $post->image ?? 'default.png';
						

$post->fill($data);
        $post->save();
		
					    session()->flash('message', trans('posts/flash.update'));
return to_route('admin.posts.edit', ['post' => $post->id, 'language' => $post->language]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
				Gate::authorize('destroy-post');

		$totalpost = Totalpost::findOrFail($post->totalpost_id);
		$totalpost->delete();
		
				session()->flash('message', trans('posts/flash.delete'));
		return to_route('admin.posts.index');

    }
	public function restore(Totalpost $totalpost)
	{
		if ($totalpost->trashed()) $totalpost->restore();
						session()->flash('message', trans('posts/flash.restore'));
		return to_route('admin.posts.trash');

	}
	public function forceDelete(Totalpost $totalpost)
	{
				if ($totalpost->trashed()){
					
					$posts = Post::where('totalpost_id', $totalpost->id)->get();
					$totalpost->forceDelete();
					
					if (count($posts) > 0){
						foreach ($posts as $post){
													if (isset($post->image)) $this->imageSaver->remove($post->image, 'posts');
						}
					}
						session()->flash('message', trans('posts/flash.force-delete'));
		return to_route('admin.posts.trash');
				}
		
	}
}
