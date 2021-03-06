<?php

namespace GriffonTech\Admin\Database\Seeders;

use GriffonTech\Admin\Migrations\Seeders\AdminTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(\GriffonTech\Core\Database\Seeders\DatabaseSeeder::class);
        $this->call(\GriffonTech\Course\Database\Seeders\DatabaseSeeder::class);
        $this->call(AdminsTableSeeder::class);
    }
}
