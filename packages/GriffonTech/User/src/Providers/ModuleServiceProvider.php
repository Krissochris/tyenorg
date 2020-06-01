<?php

namespace GriffonTech\User\Providers;

use GriffonTech\User\Models\EmailSubscription;
use GriffonTech\User\Models\Referral;
use GriffonTech\User\Models\UserPayment;
use GriffonTech\User\Models\UserPaymentDetail;
use GriffonTech\User\Models\UserReferral;
use GriffonTech\User\Models\UserWithdrawal;
use Konekt\Concord\BaseModuleServiceProvider;
use \GriffonTech\User\Models\User;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        User::class,
        UserPayment::class,
        UserReferral::class,
        Referral::class,
        UserPaymentDetail::class,
        UserWithdrawal::class,
        EmailSubscription::class
    ];
}
