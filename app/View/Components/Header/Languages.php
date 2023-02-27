<?php

namespace App\View\Components\Header;

use Illuminate\View\Component;
use LaravelLocalization;
use App\Models\Post;
use App\Models\Category;

class Languages extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
	 public $currentLanguage = [];
	 public $links = [];
	 
    public function __construct()
    {
		/*
		get the Data of the current Language
		*/
		$currentLocale = LaravelLocalization::getCurrentLocale();
		$properties = LaravelLocalization::getSupportedLocales();
		$this->currentLanguage = ['code' => $currentLocale, 'flag' => $properties[$currentLocale]['flag'], 'native' => $properties[$currentLocale]['native']];
		
        // the language switch
		switch( request()->route()->getName()) {
			case 'posts.show':
$currentPost = request('post');
$posts = Post::where('totalpost_id', $currentPost->totalpost_id)->get();
$vars = [];
if (count($posts) > 0){
foreach($posts as $post){
	$vars[$post->language] = route('posts.show', ['post' => $post->slug]);
}
}
												foreach(LaravelLocalization::getLocalesOrder() as $localeCode => $value){
													
													if (array_key_exists($localeCode, $vars)){
													$this->links[$localeCode] = LaravelLocalization::getLocalizedURL($localeCode, $vars[$localeCode], [], true);
													}
													else{
													$this->links[$localeCode] = LaravelLocalization::getLocalizedURL($localeCode, null, [], true);
													}
		}
			break;
			case 'posts.category':
			$currentCategory = request('category');
$categories = Category::where('totalcategory_id', $currentCategory->totalcategory_id)->get();
$vars = [];
if (count($categories) > 0){
foreach($categories as $category){
	$vars[$category->language] = route('posts.category', ['category' => $category->slug]);
}
}
												foreach(LaravelLocalization::getLocalesOrder() as $localeCode => $value){
													
													if (array_key_exists($localeCode, $vars)){
													$this->links[$localeCode] = LaravelLocalization::getLocalizedURL($localeCode, $vars[$localeCode], [], true);
													}
													else{
													$this->links[$localeCode] = LaravelLocalization::getLocalizedURL($localeCode, null, [], true);
													}
		}
			break;
			default:
															foreach(LaravelLocalization::getLocalesOrder() as $localeCode => $value){
													$this->links[$localeCode] = LaravelLocalization::getLocalizedURL($localeCode, null, [], true);
		}
			break;
		}
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header.languages');
    }
}
