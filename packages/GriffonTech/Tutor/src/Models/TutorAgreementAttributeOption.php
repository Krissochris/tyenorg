<?php


namespace GriffonTech\Tutor\Models;


use Illuminate\Database\Eloquent\Model;
use GriffonTech\Tutor\Contracts\TutorAgreementAttributeOption as TutorAgreementAttributeOptionContract;

class TutorAgreementAttributeOption extends Model implements TutorAgreementAttributeOptionContract
{

    protected $table = 'tutor_agreement_attribute_options';

    protected $fillable = ['admin_name', 'sort_order', 'tutor_agreement_attribute_id'];


    public function tutor_agreement_attribute()
    {
        return $this->belongsTo(TutorAgreementAttributeProxy::modelClass(), 'tutor_agreement_attribute_id', 'id');
    }
}
