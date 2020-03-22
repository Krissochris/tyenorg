<?php


namespace GriffonTech\Tutor\Repositories;


use GriffonTech\Core\Eloquent\Repository;
use GriffonTech\Tutor\Models\TutorAgreementAttributeValue;
use Illuminate\Container\Container as Application;

class TutorAgreementAttributeValueRepository extends Repository
{

    protected $tutorAgreementAttributeRepository;


    public function __construct(
        TutorAgreementAttributeRepository $tutorAgreementAttributeRepository,
        Application $app)
    {
        parent::__construct($app);
        $this->tutorAgreementAttributeRepository = $tutorAgreementAttributeRepository;
    }

    public function model()
    {
        return 'GriffonTech\Tutor\Contracts\TutorAgreementAttributeValue';
    }


    public function create(array $data)
    {
        if (isset($data['tutor_agreement_attribute_id'])) {
            $attribute = $this->tutorAgreementAttributeRepository->find($data['tutor_agreement_attribute_id']);
        } else {
            $attribute = $this->tutorAgreementAttributeRepository->findOneByField('code', $data['tutor_agreement_attribute_code']);
        }

        if (! $attribute) {
            return;
        }
        $data[TutorAgreementAttributeValue::$attributeTypeFields[$attribute->type]] = $data['value'];

        return $this->model->create($data);
    }
}
