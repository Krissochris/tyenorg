<?php


namespace GriffonTech\Tutor\Repositories;


use GriffonTech\Core\Eloquent\Repository;
use GriffonTech\Tutor\Contracts\TutorAgreementAttributeOption;

class TutorAgreementAttributeOptionRepository extends Repository
{

    public function model()
    {
        return TutorAgreementAttributeOption::class;
    }
}
