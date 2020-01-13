<?php


namespace GriffonTech\Admin\Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class AdminsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Admin Admin',
            'username' => 'admin',
            'email' => 'admin@localhost.com',
            'is_verified' => 1,
            'password' => Hash::make('secret'),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
