<?php

namespace GriffonTech\CouponSystem\Providers;

use GriffonTech\CouponSystem\Models\UserCoupon;
use Konekt\Concord\BaseModuleServiceProvider;

class CouponSystemModuleServiceProvider extends BaseModuleServiceProvider
{

    protected $models = [
        UserCoupon::class
    ];

}
