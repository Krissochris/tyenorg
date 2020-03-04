<?php

namespace GriffonTech\CouponSystem\Models;

use GriffonTech\User\Models\UserProxy;
use \Illuminate\Database\Eloquent\Model;
use GriffonTech\CouponSystem\Contracts\UserCoupon as UserCouponContract;
class UserCoupon extends Model implements UserCouponContract
{
    protected $table = 'user_coupons';

    protected $fillable = ['user_id', 'coupon_code', 'is_used', 'used_on'];


    public function user()
    {
        return $this->belongsTo(UserProxy::modelClass(), 'user_id', 'id');
    }
}
