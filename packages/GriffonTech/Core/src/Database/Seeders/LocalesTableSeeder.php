<?php

namespace GriffonTech\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class LocalesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('locales')->delete();

        DB::table('locales')->insert([
                'id' => 1,
                'code' => 'en',
                'name' => 'English',
            ]);
    }
}