<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{
    /* *
    after forceDeleting the categoy, get its children categories and update their property   Parent_id as 0
    */
    public function forceDeleted(Category $category)
    {
        if (count($category->children) > 0) {
            foreach ($category->children as $child) {
                $child->parent_id = 0;
                $child->save();
            }
        }
    }
}
