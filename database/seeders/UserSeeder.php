<?php

namespace Database\Seeders;

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
        ],
                [
        'name' => 'John smith',
        'login' => 'john_login',
        'email' => 'john@gmail.com',
        'password' => Hash::make('12345678'),
        'role_id' => 2,
        'created_at' => date('Y-m-d H:i,s'),
        ],
                [
        'name' => 'Andrew johnson',
        'login' => 'andrew_login',
        'email' => 'johnson@gmail.com',
        'password' => Hash::make('12345678'),
        'role_id' => 3,
        'created_at' => date('Y-m-d H:i,s'),
        ],
                [
        'name' => 'Canon',
        'login' => 'canon_login',
        'email' => 'canon@gmail.com',
        'password' => Hash::make('12345678'),
        'role_id' => 4,
        'created_at' => date('Y-m-d H:i,s'),
        ],
                [
        'name' => 'Cisco',
        'login' => 'cisco_login',
        'email' => 'cisco@gmail.com',
        'password' => Hash::make('12345678'),
        'role_id' => 4,
        'created_at' => date('Y-m-d H:i,s'),
        ],
                [
        'name' => 'Dell',
        'login' => 'dell_login',
        'email' => 'dell@gmail.com',
        'password' => Hash::make('12345678'),
        'role_id' => 4,
        'created_at' => date('Y-m-d H:i,s'),
        ],
                [
        'name' => 'Ea',
        'login' => 'ea_login',
        'email' => 'ea@gmail.com',
        'password' => Hash::make('12345678'),
        'role_id' => 4,
        'created_at' => date('Y-m-d H:i,s'),
        ],
                [
        'name' => 'Ebay',
        'login' => 'ebay_login',
        'email' => 'ebay@gmail.com',
        'password' => Hash::make('12345678'),
        'role_id' => 4,
        'created_at' => date('Y-m-d H:i,s'),
        ],
                [
        'name' => 'Facebook',
        'login' => 'facebook_login',
        'email' => 'facebook@gmail.com',
        'password' => Hash::make('12345678'),
        'role_id' => 4,
        'created_at' => date('Y-m-d H:i,s'),
        ],
                [
        'name' => 'Google',
        'login' => 'google_login',
        'email' => 'google@gmail.com',
        'password' => Hash::make('12345678'),
        'role_id' => 4,
        'created_at' => date('Y-m-d H:i,s'),
        ],
                [
        'name' => 'Hp',
        'login' => 'hp_login',
        'email' => 'hp@gmail.com',
        'password' => Hash::make('12345678'),
        'role_id' => 4,
        'created_at' => date('Y-m-d H:i,s'),
        ],
                [
        'name' => 'Microsoft',
        'login' => 'microsoft_login',
        'email' => 'microsoft@gmail.com',
        'password' => Hash::make('12345678'),
        'role_id' => 4,
        'created_at' => date('Y-m-d H:i,s'),
        ],
                [
        'name' => 'Sony',
        'login' => 'sony_login',
        'email' => 'sony@gmail.com',
        'password' => Hash::make('12345678'),
        'role_id' => 4,
        'created_at' => date('Y-m-d H:i,s'),
        ],
                [
        'name' => 'Yahoo',
        'login' => 'yahoo_login',
        'email' => 'yahoo@gmail.com',
        'password' => Hash::make('12345678'),
        'role_id' => 4,
        'created_at' => date('Y-m-d H:i,s'),
        ],
                [
        'name' => 'Mysql',
        'login' => 'mysql_login',
        'email' => 'mysql@gmail.com',
        'password' => Hash::make('12345678'),
        'role_id' => 4,
        'created_at' => date('Y-m-d H:i,s'),
        ],
               ]);
    }
}
