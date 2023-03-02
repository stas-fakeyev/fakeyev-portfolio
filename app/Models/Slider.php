<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\ImageSaver;

class Slider extends Model
{
    use HasFactory;

    protected $casts = ['images' => 'array'];

    protected $fillable = [
    'title',
    'subtitle',
    'images',
    'language',
    ];

    /**
   * delete an image after an event of deleting
*/
    protected static function boot()
    {
        parent::boot();

        $imageSaver = new ImageSaver();

        static::deleted(function ($slider) use ($imageSaver) {
            if (isset($slider->images['background'])) {
                $imageSaver->remove($slider->images['background'], 'home-slider');
            }
            if (isset($slider->images['slide'])) {
                $imageSaver->remove($slider->images['slide'], 'home-slider');
            }
        });
    }
}
