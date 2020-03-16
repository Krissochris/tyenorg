<?php


namespace GriffonTech\User\Repositories;


use GriffonTech\Core\Eloquent\Repository;

class UserPaymentDetailRepository extends Repository
{

    public function model()
    {
        return \GriffonTech\User\Contracts\UserPaymentDetail::class;
    }

}
