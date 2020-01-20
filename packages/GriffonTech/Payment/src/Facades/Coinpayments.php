<?php

namespace GriffonTech\Payment\Facades;

use Illuminate\Support\Facades\Facade;
use GriffonTech\Payment\Providers\CoinPaymentServiceProvider;

class Coinpayments extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return CoinpaymentServiceProvider::SINGLETON;
    }
}