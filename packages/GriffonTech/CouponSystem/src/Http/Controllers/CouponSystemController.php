<?php


namespace GriffonTech\CouponSystem\Http\Controllers;


use GriffonTech\CouponSystem\Repositories\UserCouponRepository;
use Illuminate\Http\Request;

class CouponSystemController extends Controller
{

    protected $_config;

    protected $userCouponRepository;

    public function __construct(
        UserCouponRepository $userCouponRepository
    )
    {
        $this->userCouponRepository = $userCouponRepository;
    }

    public function verify(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'coupon_code' => 'required'
        ]);

        $coupon_code = $request->input('coupon_code');

        $coupon = $this->userCouponRepository->findOneByField('coupon_code', $coupon_code);
        if (!$coupon) {
            return response()->json([
                'result' => 'error',
                'message' => 'Coupon Does not Exist'
            ]);
        }

        if ($coupon->user->username !== $request->input('username')) {
            return response()->json([
                'result' => 'error',
                'message' => 'The username does not match'
            ]);
        }

        if ($coupon->is_used) {
            return response()->json([
                'result' => 'error',
                'message' => 'The coupon code has been used.'
            ]);
        }

        if (!$coupon->is_used && !$coupon->used_on) {
            $updated = $coupon->update([
                'is_used' => 1,
                'used_on' => now()
            ]);

            if ($updated) {
                return response()->json([
                    'result' => 'ok',
                ]);
            }
        }

        return response()->json([
            'result' => 'error',
            'message' => 'Unknown: System could not understand the request.'
        ]);
    }
}
