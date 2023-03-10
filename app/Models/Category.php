<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
    'title',
    'slug',
    'language',
    'parent_id',
    'totalcategory_id',
    ];
    /**
   * make a slug during the saving
    */
    protected static function boot()
    {
        parent::boot();
        static::saving(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->title, '-');
            }
        });
    }
        public function children()
        {
            return $this->hasMany(Category::class, 'parent_id');
        }

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }
    public function validParent($id)
    {
        $id = (int)$id;
        $ids = $this->getAllChildren($this->id);
        $ids[] = $this->id;
        return !in_array($id, $ids);
    }

        public static function getAllChildren($id)
        {
            $children = self::where('parent_id', $id)->with('children')->get();
            $ids = [];
            foreach ($children as $child) {
                $ids[] = $child->id;
                if ($child->children->count()) {
                    $ids = array_merge($ids, self::getAllChildren($child->id));
                }
            }
            return $ids;
        }
}
