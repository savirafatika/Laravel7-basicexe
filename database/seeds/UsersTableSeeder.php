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
            'name' => 'Savira Fatika',
            'username' => 'savirafatika',
            'password' => bcrypt('password'),
            'email' => 'savira.fatika@students.amikom.ac.id',
        ]);
    }
}
