<?php


namespace GriffonTech\User\Helpers;

use GriffonTech\User\Repositories\ReferralRepository;
use GriffonTech\User\Repositories\UserReferralRepository;
use GriffonTech\User\Repositories\UserRepository;

class ProUserHandler {

    protected $userRepository ;

    protected $referralRepository;

    protected $userReferralRepository;


    public function __construct(
        UserRepository $userRepository,
        ReferralRepository $referralRepository,
        UserReferralRepository $userReferralRepository
    )
    {

        $this->userRepository = $userRepository;

        $this->referralRepository = $referralRepository;

        $this->userReferralRepository = $userReferralRepository;
    }

    public function becomeProUser($user_id)
    {
        $user = $this->userRepository->find($user_id);

        if ($user) {
            $madePro = $user->makeProUser();
            if ($madePro) {
                $referral = $this->referralRepository->findOneWhere([
                    'referred_id' => $user->id
                ], ['referral_id', 'referred_id']);
                if ($referral) {
                    $userReferral = $this->userReferralRepository
                        ->findOneWhere(['user_id' => $referral->referral_id]);

                    if ($userReferral) {
                        $userReferral->update([
                            'referral_bonus' => $userReferral->referral_bonus + (15 * 0.05),
                            'available_referral' => $userReferral->available_referral + 1
                        ]);
                    }

                }
            }

        }
        // get the user record and make a pro user
        // get the user referral and give the referral bonus
        // also increment the available referrals

    }
}