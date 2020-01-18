<?php

namespace GriffonTech\User\Models;

use Illuminate\Database\Eloquent\Model;
use GriffonTech\User\Contracts\Referral as ReferralContract;

class Referral extends Model implements ReferralContract
{

    protected $fillable = ['referral_id', 'referred_id'];

}