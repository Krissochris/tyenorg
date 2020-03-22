<?php


namespace GriffonTech\Tutor\Repositories;


use GriffonTech\Core\Eloquent\Repository;
use GriffonTech\Tutor\Contracts\TutorAgreement;
use GriffonTech\Tutor\Models\TutorAgreementAttributeValue;
use Illuminate\Container\Container as Application;
use Illuminate\Support\Facades\Storage;
use Webkul\Product\Models\ProductAttributeValue;

class TutorAgreementRepository extends Repository
{

    public function model()
    {
        return TutorAgreement::class;
    }

    public function update(array $data, $id)
    {
        $agreement = $this->find($id);

        $agreement->update($data);

        $agreementAttributesRepository = app(\GriffonTech\Tutor\Repositories\TutorAgreementAttributeRepository::class);
        $agreementAttributes = $agreementAttributesRepository->get();

        foreach ($agreementAttributes as $attribute) {
            if (! isset($data[$attribute->code])) {
                continue;
            }

            $attributeValueRepository = app(\GriffonTech\Tutor\Repositories\TutorAgreementAttributeValueRepository::class);

            $attributeValue = $attributeValueRepository->findOneWhere([
                'tutor_agreement_id'   => $agreement->id,
                'tutor_agreement_attribute_id' => $attribute->id,
            ]);

            if (! $attributeValue) {
                $attributeValueRepository->create([
                    'tutor_agreement_id'   => $agreement->id,
                    'tutor_agreement_attribute_id' => $attribute->id,
                    'value'        => $data[$attribute->code],
                ]);

            } else {
                $attributeValueRepository->update([
                    TutorAgreementAttributeValue::$attributeTypeFields[$attribute->type] => $data[$attribute->code]
                ], $attributeValue->id
                );
            }

        }
        return $agreement;
    }
}
