<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;

class Totalcategory extends Model
{
    use HasFactory;
		use SoftDeletes;
   protected $dates = ['deleted_at'];

		public function categories(){
		return $this->hasMany(Category::class, 'totalcategory_id');
	}

}
