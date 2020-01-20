<?php

namespace GriffonTech\Payment\Models;

use Kevupton\LaravelCoinpayments\Models\Log;

class CoinPaymentLog extends Log
{
    protected $table = 'coin_payment_log';

    public function getTable()
    {
        return $this->table;
    }
}
