<?php


namespace GriffonTech\Tutor\Models;


use Illuminate\Database\Eloquent\Model;
use GriffonTech\Tutor\Contracts\TutorAgreementAttributeValue as TutorAgreementAttributeValueContract;

class TutorAgreementAttributeValue extends Model implements TutorAgreementAttributeValueContract
{

    public $timestamps = false;

    public static $attributeTypeFields = [
        'text'        => 'text_value',
        'textarea'    => 'text_value',
        'price'       => 'float_value',
        'boolean'     => 'boolean_value',
        'select'      => 'integer_value',
        'multiselect' => 'text_value',
        'datetime'    => 'datetime_value',
        'date'        => 'date_value',
        'file'        => 'text_value',
        'image'       => 'text_value',
        'checkbox'    => 'text_value',
    ];

    protected $table = 'tutor_agreement_attribute_values';


    protected $fillable = [
        'tutor_agreement_id',
        'tutor_agreement_attribute_id',
        'text_value',
        'boolean_value',
        'integer_value',
        'float_value',
        'datetime_value',
        'date_value',
        'json_value'
    ];
}
