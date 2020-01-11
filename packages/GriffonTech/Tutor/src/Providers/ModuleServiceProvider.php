<?php

namespace GriffonTech\Tutor\Providers;

use GriffonTech\Tutor\Models\TutorProfile;
use GriffonTech\Tutor\Models\TutorWallet;
use Konekt\Concord\BaseModuleServiceProvider;


class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        TutorProfile::class,
        TutorWallet::class
    ];
}