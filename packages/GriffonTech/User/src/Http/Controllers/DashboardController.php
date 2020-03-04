<?php


namespace GriffonTech\User\Http\Controllers;


use GriffonTech\CouponSystem\Repositories\UserCouponRepository;

class DashboardController extends Controller
{

    protected $_config;

    protected $userCouponRepository;

    public function __construct(
        UserCouponRepository $userCouponRepository
    )
    {
        $this->_config = request('_config');

        $this->userCouponRepository = $userCouponRepository;
    }


    public function index()
    {
        $userCoupon = $this->userCouponRepository
            ->findOneWhere(['user_id' => auth('user')->user()->id]);

        return view($this->_config['view'])
            ->with(compact('userCoupon'));
    }
}
