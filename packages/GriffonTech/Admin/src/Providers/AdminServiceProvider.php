<?php


namespace GriffonTech\Admin\Providers;


use GriffonTech\Admin\Http\Middleware\Bouncer as BouncerMiddleware;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    public function boot(Router $router)
    {
        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');

        $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'admin');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views', 'admin');

        $router->aliasMiddleware('admin', BouncerMiddleware::class);
    }
}
