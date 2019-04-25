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
            ],
            [
                'username'=> 'tam123',
                'email' => 'tam123@gmail.com',
                'password' => Hash::make('tam123'),
            ],
            [
                'username'=> 'tamtam',
                'email' => 'tamtam@gmail.com',
                'password' => Hash::make('tamtam'),
            ],
        ]);
    }
}