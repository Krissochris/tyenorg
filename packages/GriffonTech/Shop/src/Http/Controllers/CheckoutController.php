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

            return redirect()->route('payment.coin_payment');

        } else if ($payment_method === 'rave_pay') {

            return redirect()->route('payment.rave_pay');

        } else if($payment_method === 'bank_deposit') {

            return redirect()->route('payment.bank_deposit');

        } else if ($payment_method === 'referrals') {

            return redirect()->route('payment.referrals');

        }
        else {
            session()->flash('error', 'Invalid payment method selected.');
            return back();
        }
    }
}
