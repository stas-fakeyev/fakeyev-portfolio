<?php

namespace App\Jobs;

use App\Models\Category;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdatePost implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $category;
    public $uniqueFor = 3600;
    public $tries = 5;
    public $timeout = 30;

    public function __construct(Category $category)
    {
        //
        $this->category = $category;
    }
public function uniqueId()
{
    return $this->category->slug;
}
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        if ($this->category->posts()->exists()) {
            $posts = $this->category->posts;
        } else {
            if ($this->category->parent->posts()->exists()) {
                $posts = $this->category->parent->posts;
            } else {
                $posts = [];
            }
        }
        if (count($posts) > 0) {
            foreach ($posts as $post) {
                $post->categories()->syncWithoutDetaching([$this->category->parent->id, $this->category->id]);
            }
        }
    }
}
