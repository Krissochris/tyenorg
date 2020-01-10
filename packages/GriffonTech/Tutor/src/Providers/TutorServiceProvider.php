<?php

namespace GriffonTech\Tutor\Providers;


use Illuminate\Support\ServiceProvider;

class TutorServiceProvider extends ServiceProvider
{

    public function boot()
    {
        // Register the route
        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');
        // register the migrations

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'tutor');


    }
}