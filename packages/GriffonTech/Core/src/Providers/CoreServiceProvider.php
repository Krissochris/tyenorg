<?php

namespace GriffonTech\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\AliasLoader;
use GriffonTech\Core\Core;
use GriffonTech\Core\Facades\Core as CoreFacade;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__ . '/../Http/helpers.php';

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'core');

        Validator::extend('slug', 'GriffonTech\Core\Contracts\Validations\Slug@passes');

        Validator::extend('code', 'GriffonTech\Core\Contracts\Validations\Code@passes');

        Validator::extend('decimal', 'GriffonTech\Core\Contracts\Validations\Decimal@passes');

        $this->publishes([
            dirname(__DIR__) . '/Config/concord.php' => config_path('concord.php'),
        ]);

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFacades();
    }
    /**
     * Register Bouncer as a singleton.
     *
     * @return void
     */
    protected function registerFacades()
    {
        $loader = AliasLoader::getInstance();
        $loader->alias('core', CoreFacade::class);

        $this->app->singleton('core', function () {
            return app()->make(Core::class);
        });
    }
}