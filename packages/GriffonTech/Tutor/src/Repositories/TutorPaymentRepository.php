<?php


namespace GriffonTech\Tutor\Repositories;


use GriffonTech\Core\Eloquent\Repository;
use GriffonTech\Tutor\Contracts\TutorPayment;

class TutorPaymentRepository extends Repository
{

    public function model()
    {
        return TutorPayment::class;
    }

}
