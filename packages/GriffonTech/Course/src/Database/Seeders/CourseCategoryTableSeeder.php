<?php

namespace GriffonTech\Course\Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CourseCategoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('course_categories')->delete();

        DB::table('course_categories')->insert([
            [
                'id' => 1,
                'name' => 'Office Productivity',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Web Development',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Personal Development',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Personal Development',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Spiritual Development',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}