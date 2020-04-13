<?php


namespace GriffonTech\Tutor\Models;


use GriffonTech\Tutor\Models\Scopes\SortScope;
use Illuminate\Database\Eloquent\Model;
use GriffonTech\Tutor\Contracts\TutorAgreementAttributeOption as TutorAgreementAttributeOptionContract;

class TutorAgreementAttributeOption extends Model implements TutorAgreementAttributeOptionContract
{

    protected $table = 'tutor_agreement_attribute_options';

    protected $fillable = ['admin_name', 'sort_order', 'tutor_agreement_attribute_id'];


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new SortScope);
    }


    public function tutor_agreement_attribute()
    {
        return $this->belongsTo(TutorAgreementAttributeProxy::modelClass(), 'tutor_agreement_attribute_id', 'id');
    }
}
