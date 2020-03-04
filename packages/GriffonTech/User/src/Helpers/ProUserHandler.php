<?php


namespace GriffonTech\User\Helpers;

use GriffonTech\CouponSystem\Repositories\UserCouponRepository;
use GriffonTech\User\Repositories\ReferralRepository;
use GriffonTech\User\Repositories\UserReferralRepository;
use GriffonTech\User\Repositories\UserRepository;

class ProUserHandler {

    protected $userRepository ;

    protected $referralRepository;

    protected $userReferralRepository;

    protected $userCouponRepository;


    public function __construct(
        UserRepository $userRepository,
        ReferralRepository $referralRepository,
        UserReferralRepository $userReferralRepository,
        UserCouponRepository $userCouponRepository
    )
    {

        $this->userRepository = $userRepository;

        $this->referralRepository = $referralRepository;

        $this->userReferralRepository = $userReferralRepository;

        $this->userCouponRepository = $userCouponRepository;
    }

    public function becomeProUser($user_id)
    {
        $user = $this->userRepository->find($user_id);

        if ($user) {
            $madePro = $user->makeProUser();
            if ($madePro) {
                $referral = $this->referralRepository->findOneWhere([
                    'referred_user_id' => $user->id
                ], ['referral_user_id']);

                if ($referral) {
                    $userReferral = $this->userReferralRepository
                        ->findOneWhere(['user_id' => $referral->referral_user_id]);

                    if ($userReferral) {
                        $userReferral->update([
                            'referral_bonus' => $userReferral->referral_bonus + (15 * 0.05),
                            'available_referral' => $userReferral->available_referral + 1
                        ]);
                    }

                    // create the user coupon system
                    $this->userCouponRepository->create([
                        'user_id' => $user->id,
                        'coupon_code' => $user->username.'-'.rand(100000,999999)
                    ]);
                }
            }

        }
        // get the user record and make a pro user
        // get the user referral and give the referral bonus
        // also increment the available referrals

    }
}
