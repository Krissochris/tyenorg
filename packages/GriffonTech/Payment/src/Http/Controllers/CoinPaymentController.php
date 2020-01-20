<?php

namespace GriffonTech\Payment\Http\Controllers;

use Kevupton\LaravelCoinpayments\Exceptions\CoinPaymentsResponseError;
use GriffonTech\Payment\Facades\Coinpayments;
class CoinPaymentController extends Controller
{

    public function process()
    {
        if (!request()->session()->has('payment')) {

            session()->flash('error', 'Invalid request.');
            return back();
        }

        $payment_details = request()->session()->get('payment');

        $req['amount'] = $payment_details['amount'];
        $req['currency1'] = $payment_details['currency'];
        $req['currency2'] = 'btc';
        $req['buyer_email'] = $payment_details['customer_email'];
        $req['buyer_name'] = $payment_details['user_id'];
        $req['item_number'] = $payment_details['item_no'];
        $req['ipn_url'] = url('/api/ipn');

        try {
            $transaction = Coinpayments::createTransactionSimple($req['amount'], $req['currency1'], $req['currency2'], $req);
            if ($transaction) {
                // record deposit request // continue
                // return redirect to make deposit
                return redirect($transaction->checkout_url);
            } else {
                session()->flash('error', "Could not proceed with your request. Please try another payment method");
                return back();
            }
        } catch (CoinPaymentsResponseError $exception) {
            session()->flash('error', "An Error Occurred processing your payment. Please try another payment method");
            return back();
        }
    }


    public function getPaymentStatus()
    {

    }

}