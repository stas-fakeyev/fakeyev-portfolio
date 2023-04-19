<?php

namespace App\Helpers;

use Menu;
use App\Models\Category;
use LaravelLocalization;

class MenuHelper
{
    public $menu;
    public function __construct()
    {
        $categories = Category::whereRelation('posts', 'language', LaravelLocalization::getCurrentLocale())->where('parent_id', 0)->get();

        $mBuilder = Menu::make('MyNav', function ($m) use ($categories) {
            if (count($categories) > 0) {
                foreach ($categories as $category) {
                    $m->add($category->title, route('posts.category', ['category' => $category->slug]))->id($category->slug);
                    $this->addChildren($m, $category);
                }
            }
        });
        $this->menu = $mBuilder;
    }
    public function footerMenu()
    {
        $mBuilder = Menu::make('FooterNav', function ($m) {
            $m->add('Blog', route('posts.index'))->id('blog');
        });
        return $mBuilder;
    }
    private function addChildren($m, $category)
    {
        if ($category->children->count() > 0) {
            // the category has children
            foreach ($category->children as $child) {
                $m->find($category->slug)->add($child->title, route('posts.category', ['category' => $child->slug]))->id($child->slug);
                $this->addChildren($m, $child);
            }
        }
    }
}
