<?php

use Illuminate\Database\Seeder;

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
            'name' => 'testing',
            'email' => 'testing@gmail.com',
            'password' => bcrypt('testing'),
            'address' => 'Testing location'
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'address' => 'admin location',
            'admin' => '1'
        ]);

    }
}
