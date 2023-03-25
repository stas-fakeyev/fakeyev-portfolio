<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('totalcategories')->insert([
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
		
		DB::table('categories')->insert([
		[
		'title' => 'Trendy',
		'slug' => 'trendy',
		'totalcategory_id' => 1,
		'parent_id' => 0,
		'language' => 'en',
						        'created_at' => date('Y-m-d H:i,s'),
		],
				[
		'title' => 'Clothes',
		'slug' => 'clothes',
		'totalcategory_id' => 2,
		'parent_id' => 1,
		'language' => 'en',
						        'created_at' => date('Y-m-d H:i,s'),
		],
		[
		'title' => 'Female shoes',
		'slug' => 'female-shoes',
		'totalcategory_id' => 3,
		'parent_id' => 1,
		'language' => 'en',
						        'created_at' => date('Y-m-d H:i,s'),
		],
		[
		'title' => 'Cars',
		'slug' => 'cars',
		'totalcategory_id' => 4,
		'parent_id' => 0,
		'language' => 'en',
						        'created_at' => date('Y-m-d H:i,s'),
		],
		[
		'title' => 'Мода',
		'slug' => 'moda',
		'totalcategory_id' => 1,
		'parent_id' => 0,
		'language' => 'de',
						        'created_at' => date('Y-m-d H:i,s'),
		],
		[
		'title' => 'Одежда',
		'slug' => 'odejda',
		'totalcategory_id' => 2,
		'parent_id' => 5,
		'language' => 'de',
						        'created_at' => date('Y-m-d H:i,s'),
		],
		[
		'title' => 'Женская обувь',
		'slug' => 'jenskaya-obuw',
		'totalcategory_id' => 3,
		'parent_id' => 5,
		'language' => 'de',
						        'created_at' => date('Y-m-d H:i,s'),
		],
		[
		'title' => 'Автомобили',
		'slug' => 'automobili',
		'totalcategory_id' => 4,
		'parent_id' => 0,
		'language' => 'de',
						        'created_at' => date('Y-m-d H:i,s'),
		],
		[
		'title' => 'Мода та стиль',
		'slug' => 'moda-ta-styl',
		'totalcategory_id' => 1,
		'parent_id' => 0,
		'language' => 'es',
						        'created_at' => date('Y-m-d H:i,s'),
		],
		[
		'title' => 'Одяг',
		'slug' => 'odjag',
		'totalcategory_id' => 2,
		'parent_id' => 9,
		'language' => 'es',
						        'created_at' => date('Y-m-d H:i,s'),
		],
		[
		'title' => 'Жіноче взуття',
		'slug' => 'jinoche-vzuttja',
		'totalcategory_id' => 3,
		'parent_id' => 9,
		'language' => 'es',
						        'created_at' => date('Y-m-d H:i,s'),
		],
		[
		'title' => 'Автомобілі',
		'slug' => 'avtomobili',
		'totalcategory_id' => 4,
		'parent_id' => 0,
		'language' => 'es',
						        'created_at' => date('Y-m-d H:i,s'),
		],
		]);
    }
}
