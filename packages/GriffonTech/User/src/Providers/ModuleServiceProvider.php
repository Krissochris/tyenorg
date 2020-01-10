<?php

namespace GriffonTech\User\Providers;

use Konekt\Concord\BaseModuleServiceProvider;
use \GriffonTech\User\Models\User;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        User::class,
    ];
}