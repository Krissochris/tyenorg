<?php


namespace GriffonTech\Tutor\Models;


use Illuminate\Database\Eloquent\Model;
use GriffonTech\Tutor\Contracts\TutorAgreement as TutorAgreementContract;

class TutorAgreement extends Model implements TutorAgreementContract
{

    protected $table = 'tutor_agreements';

    protected $fillable = ['tutor_application_id', 'signed_on'];


    public function tutor_application()
    {
        return $this->belongsTo(TutorApplicationProxy::modelClass(), 'tutor_application_id', 'id');
    }

    public function attribute_values()
    {
        return $this->hasMany(TutorAgreementAttributeValueProxy::modelClass(), 'tutor_agreement_id', 'id');
    }

    public function getAttribute($key)
    {
        if (! method_exists(static::class, $key)
            && ! in_array($key, ['signed_on', 'tutor_application_id'])
            && ! isset($this->attributes[$key])
        ) {
            if (isset($this->id)) {
                $this->attributes[$key] = '';

                $attribute = core()->getSingletonInstance(\GriffonTech\Tutor\Repositories\TutorAgreementAttributeRepository::class)
                    ->getAttributeByCode($key);

                $this->attributes[$key] = $this->getCustomAttributeValue($attribute);

                return $this->getAttributeValue($key);
            }
        }

        return parent::getAttribute($key);
    }


    /**
     * Get an product attribute value.
     *
     * @return mixed
     */
    public function getCustomAttributeValue($attribute)
    {
        if (! $attribute) {
            return;
        }

        $attributeValue = $this->attribute_values()->where('tutor_agreement_attribute_id', $attribute->id)->first();


        return $attributeValue[TutorAgreementAttributeValue::$attributeTypeFields[$attribute->type]] ?? null;
    }


}
