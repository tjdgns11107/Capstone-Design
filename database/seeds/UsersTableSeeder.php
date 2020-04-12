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
        \App\User::create([
            'user_id' => 'admin',
            'name' => 'admin',
            'phone' => '010-0000-0000',
            'email' => 'admin@capstone.com',
            'password' => bcrypt('admin'),
            'admin' => 1,
        ]);
        
        \App\User::create([
            'user_id' => 'test',
            'name' => 'test',
            'phone' => '010-1234-1234',
            'email' => 'test@test.com',
            'password' => bcrypt('testtest'),
        ]);
    }
}
