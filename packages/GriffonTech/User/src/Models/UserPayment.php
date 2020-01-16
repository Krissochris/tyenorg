<?php

namespace GriffonTech\User\Models;

use Illuminate\Database\Eloquent\Model;
use GriffonTech\User\Contracts\UserPayment as UserPaymentContract;

class UserPayment extends Model implements UserPaymentContract
{

    protected $fillable = [
        'user_id', 'payment_purpose', 'medium_of_payment',
        'amount'
    ];
}
