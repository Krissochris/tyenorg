<?php


namespace GriffonTech\User\Http\Controllers;


use GriffonTech\CouponSystem\Repositories\UserCouponRepository;
use GriffonTech\Course\Repositories\CourseRegistrationRepository;
use GriffonTech\User\Repositories\ReferralRepository;
use GriffonTech\User\Repositories\UserReferralRepository;

class DashboardController extends Controller
{

    protected $_config;

    protected $userCouponRepository;

    protected $userReferralRepository;

    protected $referralRepository;

    protected $courseRegistrationRepository;


    public function __construct(
        UserCouponRepository $userCouponRepository,
        UserReferralRepository $userReferralRepository,
        ReferralRepository $referralRepository,
        CourseRegistrationRepository $courseRegistrationRepository
    )
    {
        $this->_config = request('_config');

        $this->userCouponRepository = $userCouponRepository;

        $this->userReferralRepository = $userReferralRepository;

        $this->referralRepository = $referralRepository;

        $this->courseRegistrationRepository = $courseRegistrationRepository;
    }


    public function index()
    {
        $userCoupon = $this->userCouponRepository
            ->findOneWhere(['user_id' => auth('user')->user()->id]);

        $referrals = $this->referralRepository->findWhere([
            'referral_user_id' => auth('user')->user()->id
        ]);

        $user_referral = $this->userReferralRepository->firstOrCreate([
            'user_id' => auth('user')->user()->id
        ]);

        $myCoursesCount = $this->courseRegistrationRepository->findWhere([
            'user_id' => auth('user')->user()->id
        ], ['user_id'])->count();

        return view($this->_config['view'])
            ->with(compact('userCoupon', 'referrals', 'user_referral', 'myCoursesCount'));
    }
}
