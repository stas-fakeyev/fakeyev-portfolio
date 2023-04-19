<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('totalposts')->insert([
        [
                        'created_at' => date('Y-m-d H:i,s'),
                        ],
                                [
                        'created_at' => date('Y-m-d H:i,s'),
                        ],
        [
                        'created_at' => date('Y-m-d H:i,s'),
                        ],
                                                        [
                        'created_at' => date('Y-m-d H:i,s'),
                        ],
                        ]);

        DB::table('posts')->insert([
        [
        'title' => 'Post title',
        'slug' => 'post-title',
        'text' => '<p>the full text</p>',
        'user_id' => 2,
        'totalpost_id' => 1,
        'language' => 'en',
        'year' => 2023,
        'month_name' => 'January',
        'month' => 01,
                                'created_at' => date('Y-m-d H:i,s'),
        ],
        [
        'title' => 'Первый пост',
        'slug' => 'perviy-post',
        'text' => '<p>Привет мир!</p>',
        'user_id' => 2,
        'totalpost_id' => 1,
        'language' => 'de',
        'year' => 2023,
        'month_name' => 'January',
        'month' => 01,
                                'created_at' => date('Y-m-d H:i,s'),
        ],
        [
        'title' => 'Перший пост',
        'slug' => 'pershiy-post',
        'text' => '<p>повний текст поста!</p>',
        'user_id' => 2,
        'totalpost_id' => 1,
        'language' => 'es',
        'year' => 2023,
        'month_name' => 'January',
        'month' => 01,
                                'created_at' => date('Y-m-d H:i,s'),
        ],
        [
        'title' => 'Post title2',
        'slug' => 'post-title2',
        'text' => '<p>the full text</p>',
        'user_id' => 2,
        'totalpost_id' => 2,
        'language' => 'en',
        'year' => 2023,
        'month_name' => 'February',
        'month' => 02,
                                'created_at' => date('Y-m-d H:i,s'),
        ],
        [
        'title' => 'Второй пост',
        'slug' => 'vtoroy-post',
        'text' => '<p>Привет мир2!</p>',
        'user_id' => 2,
        'totalpost_id' => 2,
        'language' => 'de',
        'year' => 2023,
        'month_name' => 'February',
        'month' => 02,
                                'created_at' => date('Y-m-d H:i,s'),
        ],
        [
        'title' => 'Другий пост',
        'slug' => 'drugiy-post',
        'text' => '<p>повний текст поста2!</p>',
        'user_id' => 2,
        'totalpost_id' => 2,
        'language' => 'es',
        'year' => 2023,
        'month_name' => 'February',
        'month' => 02,
                                'created_at' => date('Y-m-d H:i,s'),
        ],
        [
        'title' => 'Post title3',
        'slug' => 'post-title3',
        'text' => '<p>the full text3</p>',
        'user_id' => 2,
        'totalpost_id' => 3,
        'language' => 'en',
        'year' => 2023,
        'month_name' => 'March',
        'month' => 03,
                                'created_at' => date('Y-m-d H:i,s'),
        ],
        [
        'title' => 'Третий пост',
        'slug' => 'tretiy-post',
        'text' => '<p>Привет мир3!</p>',
        'user_id' => 2,
        'totalpost_id' => 3,
        'language' => 'de',
        'year' => 2023,
        'month_name' => 'March',
        'month' => 03,
                                'created_at' => date('Y-m-d H:i,s'),
        ],
        [
        'title' => 'Новий пост',
        'slug' => 'noviy-post',
        'text' => '<p>повний текст нового поста!</p>',
        'user_id' => 2,
        'totalpost_id' => 3,
        'language' => 'es',
        'year' => 2023,
        'month_name' => 'March',
        'month' => 03,
                                'created_at' => date('Y-m-d H:i,s'),
        ],
        [
        'title' => 'Post title4',
        'slug' => 'post-title4',
        'text' => '<p>the full text4</p>',
        'user_id' => 2,
        'totalpost_id' => 4,
        'language' => 'en',
        'year' => 2023,
        'month_name' => 'March',
        'month' => 03,
                                'created_at' => date('Y-m-d H:i,s'),
        ],
        [
        'title' => 'Четвертый пост',
        'slug' => 'chetvertiy-post',
        'text' => '<p>Привет мир4!</p>',
        'user_id' => 2,
        'totalpost_id' => 4,
        'language' => 'de',
        'year' => 2023,
        'month_name' => 'March',
        'month' => 03,
                                'created_at' => date('Y-m-d H:i,s'),
        ],
        [
        'title' => 'пост 4',
        'slug' => 'post-4',
        'text' => '<p>повний текст четвертого поста!</p>',
        'user_id' => 2,
        'totalpost_id' => 4,
        'language' => 'es',
        'year' => 2023,
        'month_name' => 'March',
        'month' => 03,
                                'created_at' => date('Y-m-d H:i,s'),
        ],

        ]);

        DB::table('category_post')->insert([
        [
        'post_id' => 1,
        'category_id' => 1,
        ],
        [
        'post_id' => 1,
        'category_id' => 2,
        ],
        [
        'post_id' => 2,
        'category_id' => 5,
        ],
        [
        'post_id' => 2,
        'category_id' => 6,
        ],
        [
        'post_id' => 3,
        'category_id' => 9,
        ],
        [
        'post_id' => 3,
        'category_id' => 10,
        ],
        [
        'post_id' => 4,
        'category_id' => 1,
        ],
        [
        'post_id' => 4,
        'category_id' => 3,
        ],
        [
        'post_id' => 5,
        'category_id' => 5,
        ],
        [
        'post_id' => 5,
        'category_id' => 7,
        ],
        [
        'post_id' => 6,
        'category_id' => 9,
        ],
        [
        'post_id' => 6,
        'category_id' => 11,
        ],
        [
        'post_id' => 7,
        'category_id' => 4,
        ],
        [
        'post_id' => 8,
        'category_id' => 8,
        ],
        [
        'post_id' => 9,
        'category_id' => 12,
        ],
        [
        'post_id' => 10,
        'category_id' => 4,
        ],
        [
        'post_id' => 11,
        'category_id' => 8,
        ],
        [
        'post_id' => 12,
        'category_id' => 12,
        ],
        ]);
    }
}
