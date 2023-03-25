<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
'category_id' => 2,
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
'category_id' => 6,
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
'category_id' => 10,
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
'category_id' => 3,
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
'category_id' => 7,
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
'category_id' => 11,
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
'category_id' => 4,
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
'category_id' => 8,
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
'category_id' => 12,
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
'category_id' => 4,
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
'category_id' => 8,
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
'category_id' => 12,
'user_id' => 2,
'totalpost_id' => 4,
'language' => 'es',
'year' => 2023,
'month_name' => 'March',
'month' => 03,
				        'created_at' => date('Y-m-d H:i,s'),
],

]);
    }
}
