<?php

namespace GriffonTech\Testimony\Providers;

use GriffonTech\Testimony\Models\Testimony;
use Konekt\Concord\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        Testimony::class
    ];
}