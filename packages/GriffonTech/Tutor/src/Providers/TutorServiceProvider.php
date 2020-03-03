<?php

namespace GriffonTech\Tutor\Providers;


use GriffonTech\Tutor\Http\Middleware\TutorMiddleware;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class TutorServiceProvider extends ServiceProvider
{

    public function boot(Router $router)
    {
        // Register the route
        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');
        // register the migrations

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'tutor');

        $router->aliasMiddleware('tutor', TutorMiddleware::class);

    }
}
