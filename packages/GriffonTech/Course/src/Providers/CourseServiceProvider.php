<?php

namespace GriffonTech\Course\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;


class CourseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'course');

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

}