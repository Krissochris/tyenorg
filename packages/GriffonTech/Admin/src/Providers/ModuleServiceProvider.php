<?php

namespace GriffonTech\Admin\Providers;

use GriffonTech\Admin\Models\Admin;
use Konekt\Concord\BaseModuleServiceProvider;


class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        Admin::class
    ];
}