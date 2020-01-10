<?php
namespace GriffonTech\User\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use GriffonTech\User\Http\Middleware\RedirectIfNotUser;

class UserServiceProvider extends ServiceProvider {

    public function boot(Router $router)
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $router->aliasMiddleware('user', RedirectIfNotUser::class);
    }
}