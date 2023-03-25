<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewspaperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('newspapers')->insert([
		[
		"title" => "Morbi eleifend congue elit nec sagittis. Praesent aliquam",
		"url" => "http://example.com/2/",
						        'created_at' => date('Y-m-d H:i,s'),
		],
				[
		"title" => "Morbi eleifend congue elit nec sagittis. Praesent aliquam2",
		"url" => "http://example.com/3/",
						        'created_at' => date('Y-m-d H:i,s'),
		],
				[
		"title" => "Morbi eleifend congue elit nec sagittis. Praesent aliquam3",
		"url" => "http://example.com/1/",
						        'created_at' => date('Y-m-d H:i,s'),
		],
			]);
    }
}