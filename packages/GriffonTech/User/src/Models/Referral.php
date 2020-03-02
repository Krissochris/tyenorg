<?php

namespace GriffonTech\User\Models;

use Illuminate\Database\Eloquent\Model;
use GriffonTech\User\Contracts\Referral as ReferralContract;

class Referral extends Model implements ReferralContract
{

    protected $fillable = ['referral_user_id', 'referred_user_id'];

    public function referral_user()
    {
        return $this->belongsTo(UserProxy::modelClass(), 'referral_user_id');
    }

    public function referred_user()
    {
        return $this->belongsTo(UserProxy::modelClass(), 'referred_user_id', 'id');
    }

}
