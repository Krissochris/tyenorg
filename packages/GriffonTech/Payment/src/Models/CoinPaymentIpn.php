<?php

namespace GriffonTech\Payment\Models;

use Illuminate\Database\Eloquent\Model;
use Kevupton\LaravelCoinpayments\Models\Ipn;

class CoinPaymentIpn extends Ipn
{

    public function getTable()
    {
        return 'coin_payment_ipns';
    }
}
