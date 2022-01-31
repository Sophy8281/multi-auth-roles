<?php

namespace Database\Seeders;

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
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin@admin'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user@user'),
        ]);

        DB::table('users')->insert([
            'role_id' => '3',
            'name' => 'Manager',
            'email' => 'manager@gmail.com',
            'password' => bcrypt('manager@manager'),
        ]);
    }
}
