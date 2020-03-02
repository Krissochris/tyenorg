<?php

namespace GriffonTech\Tutor\Providers;

use GriffonTech\Tutor\Models\TutorApplication;
use GriffonTech\Tutor\Models\TutorApplicationSubmission;
use GriffonTech\Tutor\Models\TutorCourse;
use GriffonTech\Tutor\Models\TutorProfile;
use GriffonTech\Tutor\Models\TutorWallet;
use Konekt\Concord\BaseModuleServiceProvider;


class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        TutorProfile::class,
        TutorWallet::class,
        TutorApplication::class,
        TutorCourse::class,
        TutorApplicationSubmission::class,
    ];
}
