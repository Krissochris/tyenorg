<?php


namespace GriffonTech\User\Repositories;


use GriffonTech\Core\Eloquent\Repository;

class EmailSubscriptionRepository extends Repository
{

    public function model()
    {
        return 'GriffonTech\User\Contracts\EmailSubscription';
    }
}
