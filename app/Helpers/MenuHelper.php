<?php

namespace App\Helpers;

use Menu;
use App\Models\Category;
use LaravelLocalization;

class MenuHelper {

public $menu;
public function __construct()
{
	$categories = Category::where('language', LaravelLocalization::getCurrentLocale())->get();
	
		$mBuilder = Menu::make('MyNav', function($m) use ($categories) {
		foreach($categories as $item){
			//if there are not the parent
			if($item->parent_id == 0)
			{
				$m->add($item->title, route('posts.category', ['category' => $item->slug]))->id($item->id);
			}
			else
			{
				if($m->find($item->parent_id))
				{
					$m->find($item->parent_id)->add($item->title, route('posts.category', ['category' => $item->slug]))->id($item->id);
				}
			}
		} //endforeach
	});
$this->menu = $mBuilder;
}
public function footerMenu()
{
		$mBuilder = Menu::make('FooterNav', function($m) {
				$m->add('Blog', route('posts.index'))->id('blog');
	});
return $mBuilder;

}
}