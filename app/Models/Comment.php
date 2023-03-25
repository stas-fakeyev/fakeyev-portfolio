<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
    'name',
    'email',
    'text',
    'parent_id',
    'post_id',
    'user_id',
    ];
    /**
     * Get all of the models that own comments.
     */
    public function commentable()
    {
        return $this->morphTo();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function childrenComments()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
    public function getAmount()
    {
        $like = $this->likes ?? 0;
        $dizlike = $this->dizlikes ?? 0;
        return ($like - $dizlike);
    }
}
