<?php

use App\User;
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
        User::create([
            'username' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
            'type' => 'admin'
        ]);


        User::create([
            'username' => 'User1',
            'email' => 'user1@mail.com',
            'password' => bcrypt('1234')
        ]);

        User::create([
            'username' => 'User2',
            'email' => 'user2@mail.com',
            'password' => bcrypt('1234')
        ]);

        User::create([
            'username' => 'User3',
            'email' => 'user3@mail.com',
            'password' => bcrypt('1234')
        ]);
    }
}
