<?php


namespace GriffonTech\User\Repositories;


use GriffonTech\Core\Eloquent\Repository;
use GriffonTech\User\Contracts\UserWithdrawal;

class UserWithdrawalRepository extends Repository
{

    public function model()
    {
        return UserWithdrawal::class;
    }
}
