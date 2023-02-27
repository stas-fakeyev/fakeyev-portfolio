<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		DB::table('users')->
		insert([
		[
		'name' => 'admin',
		'login' => 'admin_login',
		'email' => 'admin@gmail.com',
		'password' => Hash::make('12345678'),
		'role_id' => 1,
		'created_at' => date('Y-m-d H:i,s'),
		] //endfirst
		]); //endinsert
    }
}
