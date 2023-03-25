<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('sliders')->insert([
		[
		'title' => 'Responsive',
		'subtitle' => 'It looks great on desktops, laptops, tablets and smartphones',
		'language' => 'en',
		'images' => json_encode(['background' => 'default.png', 'slide' => 'default.png']),
						        'created_at' => date('Y-m-d H:i,s'),
		],
				[
		'title' => 'Color Schemes',
		"subtitle" => "Comes with 5 color schemes and it's easy to make your own!",
		'language' => 'en',
				'images' => json_encode(['background' => 'default.png', 'slide' => 'default.png']),
								        'created_at' => date('Y-m-d H:i,s'),
		],
				[
		'title' => 'Feature Rich',
		'subtitle' => 'Huge amount of components and over 30 sample pages!',
		'language' => 'en',
				'images' => json_encode(['background' => 'default.png', 'slide' => 'default.png']),
								        'created_at' => date('Y-m-d H:i,s'),
		],
				[
		'title' => 'Отзывчивость',
		'subtitle' => 'Слайдер выглядит отлично на компьютерах, ноутбуках, планшетах и смартфонах',
		'language' => 'de',
				'images' => json_encode(['background' => 'default.png', 'slide' => 'default.png']),
								        'created_at' => date('Y-m-d H:i,s'),
		],
				[
		'title' => 'Цветовые схемы',
		'subtitle' => 'Поставляется с пятью схемами и легко создать свою!',
		'language' => 'de',
				'images' => json_encode(['background' => 'default.png', 'slide' => 'default.png']),
								        'created_at' => date('Y-m-d H:i,s'),
		],
				[
		'title' => 'Многофункциональность',
		'subtitle' => 'Огромное количество компонентов и более 30 страниц примеров!',
		'language' => 'de',
				'images' => json_encode(['background' => 'default.png', 'slide' => 'default.png']),
								        'created_at' => date('Y-m-d H:i,s'),
		],
				[
		'title' => 'Гнучкість',
		"subtitle" => "Слаййдер виглядаї чудово на комп'ютерах, ноутбуках, планшетах та смартфонах",
		'language' => 'es',
				'images' => json_encode(['background' => 'default.png', 'slide' => 'default.png']),
								        'created_at' => date('Y-m-d H:i,s'),
		],
				[
		'title' => 'Кольорові схеми',
		"subtitle" => "Слайдер постачаїться з 5 кольоровимі схемами, також легко створити свою!",
		'language' => 'es',
				'images' => json_encode(['background' => 'default.png', 'slide' => 'default.png']),
								        'created_at' => date('Y-m-d H:i,s'),
		],
				[
		'title' => 'Багатофункціональність',
		"subtitle" => "Багата кількість компонентів та більше 30 сторінок шаблонів!",
		'language' => 'es',
				'images' => json_encode(['background' => 'default.png', 'slide' => 'default.png']),
								        'created_at' => date('Y-m-d H:i,s'),
		],
]);


    }
}
