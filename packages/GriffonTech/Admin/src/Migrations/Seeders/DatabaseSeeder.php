<?php

namespace GriffonTech\Admin\Database\Seeders;

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
    }
}
