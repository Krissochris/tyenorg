<?php

namespace GriffonTech\Shop\Http\Controllers;

class CheckoutController extends Controller
{

    public function process()
    {
        if (!request()->session()->has('payment')) {
            return back();
        }

        $payment_method = request()->input('paymentMethod');

        if ($payment_method === 'pay_pal') {

            return redirect()->route('payment.pay_pal');

        } elseif ($payment_method === 'coin_payment') {

        } else if ($payment_method === 'rave_pay') {

        }
    }
}