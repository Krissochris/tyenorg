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
            return $user->makeProUser();
        }
        return false;
    }
}
