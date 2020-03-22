<?php


namespace GriffonTech\Tutor\Repositories;


use GriffonTech\Core\Eloquent\Repository;
use GriffonTech\Tutor\Contracts\TutorAgreementAttribute;

class TutorAgreementAttributeRepository extends Repository
{

    public function model()
    {
        return TutorAgreementAttribute::class;
    }


    public function getAttributeByCode($code)
    {
        static $attributes = [];

        if (array_key_exists($code, $attributes)) {
            return $attributes[$code];
        }

        return $attributes[$code] = $this->findOneByField('code', $code);
    }
}
