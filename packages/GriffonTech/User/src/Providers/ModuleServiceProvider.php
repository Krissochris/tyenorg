<?php

namespace GriffonTech\User\Providers;

use Konekt\Concord\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        \GriffonTech\User\Models\User::class,
    ];
}