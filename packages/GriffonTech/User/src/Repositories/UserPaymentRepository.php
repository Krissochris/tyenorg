<?php

namespace GriffonTech\User\Repositories;

use GriffonTech\Core\Eloquent\Repository;

class UserPaymentRepository extends Repository
{
    public function model()
    {
        return 'GriffonTech\User\Contracts\UserPayment';
    }
}