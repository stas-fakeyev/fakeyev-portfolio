<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Stem\LinguaStemRu;
use LaravelLocalization;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
    'title',
    'slug',
    'image',
    'text',
    'language',
    'user_id',
    'totalpost_id',
    'category_id',
    'month',
    'year',
    'month_name',
    ];
    /**
   * make a slug during the saving
    */
    protected static function boot()
    {
        parent::boot();
        static::saving(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title, '-');
            }
        });
    }
    /**
   * comments
    */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    /**
   * scopes
    */
        public function scopeSearch($query, $search)
        {
            // cut the search query
            $search = iconv_substr($search, 0, 64);

            // remove all except letters and diggits
            $search = preg_replace('#[^0-9a-zA-ZА-Яа-яёЁ]#u', ' ', $search);

            // remove dooble spaces
            $search = preg_replace('#\s+#u', ' ', $search);
            $search = trim($search);
            if (empty($search)) {
                return $query->whereNull('id'); // return the empty result
            }
            // explode the search query into the words
            $temp = explode(' ', $search);
            $words = [];
            $stemmer = new LinguaStemRu();
            foreach ($temp as $item) {
                if (LaravelLocalization::getCurrentLocale() != 'en') {
                    if (iconv_strlen($item) > 3) {
                        $words[] = $stemmer->stem_word($item);
                    } else {
                        $words[] = $item;
                    }
                } else {
                    $words[] = $item;
                }
            }
            $relevance = "IF (`posts`.`title` LIKE '%" . $words[0] . "%', 2, 0)";
            $relevance .= " + IF (`posts`.`text` LIKE '%" . $words[0] . "%', 1, 0)";
            $relevance .= " + IF (`categories`.`title` LIKE '%" . $words[0] . "%', 1, 0)";

            for ($i = 1; $i < count($words); $i++) {
                $relevance .= " + IF (`posts`.`title` LIKE '%" . $words[$i] . "%', 2, 0)";
                $relevance .= " + IF (`posts`.`text` LIKE '%" . $words[$i] . "%', 1, 0)";
                $relevance .= " + IF (`categories`.`title` LIKE '%" . $words[$i] . "%', 1, 0)";
            }

            $query->join('categories', 'categories.id', '=', 'posts.category_id')
                ->select('posts.*', DB::raw($relevance . ' as relevance'))
                ->where('posts.title', 'like', '%' . $words[0] . '%')
                ->orWhere('posts.text', 'like', '%' . $words[0] . '%')
                ->orWhere('categories.title', 'like', '%' . $words[0] . '%');
            for ($i = 1; $i < count($words); $i++) {
                $query = $query->orWhere('posts.title', 'like', '%' . $words[$i] . '%');
                $query = $query->orWhere('posts.text', 'like', '%' . $words[$i] . '%');
                $query = $query->orWhere('categories.title', 'like', '%' . $words[$i] . '%');
            }
            $query->orderBy('relevance', 'desc');
            return $query;
        }
}
