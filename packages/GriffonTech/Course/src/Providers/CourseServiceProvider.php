<?php

namespace GriffonTech\Course\Providers;

use GriffonTech\Course\CourseRegistration;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use GriffonTech\Course\CourseRegistration as CourseRegistrationFacade;

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
        $loader = AliasLoader::getInstance();
        $loader->alias('CourseRegistration', CourseRegistrationFacade::class);

        $this->app->singleton('CourseRegistration', function () {
            return $this->app->make(CourseRegistration::class);
        });
    }

}