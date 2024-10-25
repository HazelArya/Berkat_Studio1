<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'usertype' => 'admin',
                'password' => Hash::make('qwerty123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'hazel',
                'email' => 'hazel.widikdo@gmail.com',
                'usertype' => 'customer',
                'password' => Hash::make('qwerty123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'e',
                'email' => 'e@gmail.com',
                'usertype' => 'employee',
                'password' => Hash::make('qwerty123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
