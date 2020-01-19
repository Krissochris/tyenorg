<?php

namespace GriffonTech\Faq\Providers;

use GriffonTech\Faq\Models\Faq;
use Konekt\Concord\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        Faq::class
    ];
}