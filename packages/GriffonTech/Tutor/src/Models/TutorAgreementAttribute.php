<?php


namespace GriffonTech\Tutor\Models;


use Illuminate\Database\Eloquent\Model;
use GriffonTech\Tutor\Contracts\TutorAgreementAttribute as TutorAgreementAttributeContract;

class TutorAgreementAttribute extends Model implements TutorAgreementAttributeContract
{
    protected $table = 'tutor_agreement_attributes';

    protected $fillable = ['code','admin_name','type', 'validation', 'position'];

    public function options()
    {
        return $this->hasMany(TutorAgreementAttributeOptionProxy::modelClass(), 'tutor_agreement_attribute_id', 'id');
    }


}
