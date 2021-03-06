<?php

namespace GriffonTech\Tutor\Providers;

use GriffonTech\Tutor\Models\TutorAgreement;
use GriffonTech\Tutor\Models\TutorAgreementAttribute;
use GriffonTech\Tutor\Models\TutorAgreementAttributeOption;
use GriffonTech\Tutor\Models\TutorAgreementAttributeValue;
use GriffonTech\Tutor\Models\TutorApplication;
use GriffonTech\Tutor\Models\TutorApplicationSubmission;
use GriffonTech\Tutor\Models\TutorCourse;
use GriffonTech\Tutor\Models\TutorPayment;
use GriffonTech\Tutor\Models\TutorProfile;
use GriffonTech\Tutor\Models\TutorWallet;
use GriffonTech\Tutor\Models\TutorWithdrawal;
use Konekt\Concord\BaseModuleServiceProvider;


class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        TutorProfile::class,
        TutorWallet::class,
        TutorApplication::class,
        TutorCourse::class,
        TutorApplicationSubmission::class,
        TutorPayment::class,
        TutorWithdrawal::class,
        TutorAgreementAttribute::class,
        TutorAgreementAttributeOption::class,
        TutorAgreement::class,
        TutorAgreementAttributeValue::class
    ];
}
