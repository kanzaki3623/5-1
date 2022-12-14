<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users') -> insert([
            [
            'name' => '田中',
            'email' => 'aaaa@ssss.com',
            'password' => bcrypt('password'),
        ],
        [
            'name' => 'やまだ',
            'email' => 'a12@ssss.com',
            'password' => bcrypt('password'),
        ],
        [
            'name' => 'よしだ',
            'email' => 'aaaa3@ssss.com',
            'password' => bcrypt('password'),
        ],
        ]);
    }
}
