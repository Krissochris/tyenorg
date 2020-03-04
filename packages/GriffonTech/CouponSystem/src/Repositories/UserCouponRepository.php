<?php


namespace GriffonTech\CouponSystem\Repositories;


use GriffonTech\Core\Eloquent\Repository;
use GriffonTech\CouponSystem\Contracts\UserCoupon;

class UserCouponRepository extends Repository
{

    public function model()
    {
        return UserCoupon::class;
    }

}
