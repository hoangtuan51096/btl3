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
        DB::table('users')->truncate();
        App\User::create([
            'account' => 'admin',
            'password' => bcrypt('1'),
            'email' => 'hoangtuan51096@gmail.com',
            'name' => 'Hoang tuan',
            'role' => 'admin',
            'active' => 'active'
        ]);
        App\User::create([
            'account' => 'tuanha1',
            'password' => bcrypt('1'),
            'email' => 'anhtuan51096@gmail.com',
            'name' => 'Hoang anh tuan',
            'role' => 'employee',
            'active' => 'new'
        ]);
    }
}
