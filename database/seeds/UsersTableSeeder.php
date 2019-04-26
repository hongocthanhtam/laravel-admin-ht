<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username'=> 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'is_admin' => 1,
            ],
            [
                'username'=> 'tam123',
                'email' => 'tieutinh201@gmail.com',
                'password' => Hash::make('tam123'),
                'is_admin' => 0,
            ],
            [
                'username'=> 'tamtam',
                'email' => 'tamtam@gmail.com',
                'password' => Hash::make('tamtam'),
                'is_admin' => 0,
            ],
        ]);
    }
}