<?php

namespace GriffonTech\User\Http\Controllers;


use GriffonTech\User\Repositories\ReferralRepository;
use GriffonTech\User\Repositories\UserReferralRepository;

class ReferralController extends Controller
{

    protected $_config;

    protected $userReferralRepository;

    protected $referralRepository;


    public function __construct(
        UserReferralRepository $userReferralRepository,
        ReferralRepository $referralRepository
    )
    {

        $this->_config = request('_config');

        $this->userReferralRepository = $userReferralRepository;

        $this->referralRepository = $referralRepository;
    }

    public function show()
    {
        $referrals = $this->referralRepository->findWhere([
            'referral_id' => auth('user')->user()->id
        ]);

        $user_referral = $this->userReferralRepository->firstOrCreate([
            'user_id' => auth('user')->user()->id
        ]);

        return view($this->_config['view'], compact('referrals', 'user_referral'));
    }
}