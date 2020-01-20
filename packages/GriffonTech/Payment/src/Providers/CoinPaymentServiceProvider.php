<?php

namespace GriffonTech\Payment\Providers;

use GriffonTech\Payment\CoinPayment\LaravelCoinpayments;
use Kevupton\LaravelCoinpayments\Providers\LaravelCoinpaymentsServiceProvider;
use Kevupton\LaravelCoinpayments\Models\Transaction;
use Kevupton\LaravelCoinpayments\Observables\TransactionObservable;
use Kevupton\LaravelCoinpayments\Controllers\CoinpaymentsController;

class CoinPaymentServiceProvider extends LaravelCoinpaymentsServiceProvider
{
    const SINGLETON = 'coinpayments';

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Transaction::observe(new TransactionObservable());
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(self::SINGLETON, function ($app) {
            return new LaravelCoinpayments($app);
        });

        $this->registerAlias(LaravelCoinpayments::class, 'Coinpayments');
        $this->registerRoute();

    }

    private function registerRoute ()
    {
        $is_enabled = config('coinpayments.route.enabled');
        $path       = config('coinpayments.route.path');

        if (!$is_enabled) {
            return;
        }

        $router = $this->router();
        $router->post($path, ['as' => 'coinpayments.ipn', 'uses' => CoinpaymentsController::class . '@validateIPN']);
    }
}
