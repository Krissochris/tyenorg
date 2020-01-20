<?php


namespace GriffonTech\User\Http\Controllers;


class BecomeProUserController extends Controller
{

    protected $_config;


    public function __construct()
    {
        $this->_config = request('_config');
    }


    public function index()
    {
        return view($this->_config['view']);
    }

    public function create()
    {

        request()->session()->put('payment', [
            'amount' => 15,
            'user_id' => auth('user')->user()->id,
            'item_no' => 1001,
            'customer_name' => auth('user')->user()->name,
            'customer_email' => auth('user')->user()->email,
            'customer_phone_number' => auth('user')->user()->phone_number,
            'purpose' => 'Pro User Package',
            'purchase_type' => 'pro_user_package_purchase',
            'currency' => "USD"
        ]);

        $payment_method = request()->input('paymentMethod');

        if ($payment_method === 'pay_pal') {

            return redirect()->route('payment.pay_pal');

        } elseif ($payment_method === 'coin_payment') {

        } else if ($payment_method === 'rave_pay') {

            return redirect()->route('payment.rave_pay');
        }
    }

}