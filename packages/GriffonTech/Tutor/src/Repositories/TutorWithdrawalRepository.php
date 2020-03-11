<?php


namespace GriffonTech\Tutor\Repositories;


use GriffonTech\Core\Eloquent\Repository;
use GriffonTech\Tutor\Contracts\TutorWithdrawal;

class TutorWithdrawalRepository extends Repository
{
    public function model()
    {
        return TutorWithdrawal::class;
    }
}
