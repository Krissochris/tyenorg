<?php


namespace GriffonTech\User\Models;

use Illuminate\Database\Eloquent\Model;
use GriffonTech\User\Contracts\UserReferral as UserReferralContract;

class UserReferral extends Model implements UserReferralContract
{

    protected $fillable = [
        'user_id', 'referral_bonus', 'total_referral',
        'available_referral'
    ];

}

