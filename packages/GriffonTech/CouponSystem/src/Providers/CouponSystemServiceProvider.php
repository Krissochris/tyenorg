<?php


namespace GriffonTech\CouponSystem\Providers;


use Illuminate\Support\ServiceProvider;

class CouponSystemServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');
    }

}
