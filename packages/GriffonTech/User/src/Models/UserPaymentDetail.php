<?php


namespace GriffonTech\User\Models;


use Illuminate\Database\Eloquent\Model;
use GriffonTech\User\Contracts\UserPaymentDetail as UserPaymentDetailContract;

class UserPaymentDetail extends Model implements UserPaymentDetailContract
{
    protected $table = 'user_payment_details';

    protected $fillable = ['user_id', 'bank_name', 'account_name',
        'account_number', 'btc_address', 'paypal_email_address', 'is_saved'];
}
