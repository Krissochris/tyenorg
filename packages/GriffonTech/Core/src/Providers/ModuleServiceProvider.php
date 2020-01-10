<?php

namespace GriffonTech\Core\Providers;

use GriffonTech\Core\Models\CoreConfig;
use GriffonTech\Core\Models\Country;
use GriffonTech\Core\Models\CountryState;
use GriffonTech\Core\Models\Currency;
use GriffonTech\Core\Models\CurrencyExchangeRate;
use GriffonTech\Core\Models\Locale;
use GriffonTech\Core\Models\SubscribersList;
use Konekt\Concord\BaseModuleServiceProvider;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        CoreConfig::class,
        Country::class,
        CountryState::class,
        Currency::class,
        CurrencyExchangeRate::class,
        Locale::class,
        SubscribersList::class
    ];
}