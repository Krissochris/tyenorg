<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use GriffonTech\User\Repositories\UserRepository;
use GriffonTech\User\Repositories\ReferralRepository;
use GriffonTech\User\Repositories\UserReferralRepository;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
        Event::listen('customer.registration.after', function ($newUser) {
            $referral_username = urldecode(request()->cookie('ref'));

            try {
                $userRepository = $this->app->make(UserRepository::class);
                $referralRepository = $this->app->make(ReferralRepository::class);
                $userReferralRepository = $this->app->make(UserReferralRepository::class);

                $referral_user = $userRepository->findOneByField('username', $referral_username, ['id', 'username']);

                if ($referral_user) {
                    $referralRepository->create([
                        'referral_user_id' => $referral_user->id,
                        'referred_user_id' => $newUser->id
                    ]);

                    $referralUserProfile = $userReferralRepository->firstOrCreate([
                        'user_id' => $referral_user->id
                    ]);

                    $referralUserProfile ->update([
                        'total_referral' =>(int) $referralUserProfile->total_referral + 1
                    ]);

                }
            } catch (\Exception $exception) {
                // sub due error
            }

        });
    }
}
