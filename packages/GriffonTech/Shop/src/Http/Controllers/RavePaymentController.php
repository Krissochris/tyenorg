<?php

namespace GriffonTech\Shop\Http\Controllers;

class RavePaymentController extends Controller
{

    protected $_publicKey;

    public function __construct()
    {
        $this->_publicKey = 'FLWPUBK_TEST-3009a70205553a445c3d826adfa87982-X';
    }


    public function process()
    {
        if (!request()->session()->exists('payment')) {

            session()->flash('error','Invalid action');

            return redirect('/');
        }
        $payment_details = request()->session()->get('payment');

        $curl = curl_init();

        $customer_email = auth('user')->user()->email;
        $amount = $payment_details['amount'];
        $currency = "USD";
        $txref = "rave-12345"; // ensure you generate unique references per transaction.
        $PBFPubKey = $this->_publicKey; // get your public key from the dashboard.

        $redirect_url = route('payment.rave_pay.status');
        //$payment_plan = "pass the plan id"; // this is only required for recurring payments.

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode([
                'amount'=>$amount,
                'customer_email'=>$customer_email,
                'currency'=>$currency,
                'txref'=>$txref,
                'PBFPubKey'=>$PBFPubKey,
                'redirect_url'=>$redirect_url,
                //'payment_plan'=>$payment_plan
            ]),
            CURLOPT_HTTPHEADER => [
                "content-type: application/json",
                "cache-control: no-cache"
            ],
        ));

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($curl);
        $err = curl_error($curl);

        if($err){
            // there was an error contacting the rave API
            die('Curl returned error: ' . $err);
        }

        $transaction = json_decode($response);

        if(!$transaction->data && !$transaction->data->link){
            // there was an error from the API
            print_r('API returned error: ' . $transaction->message);
        }

        return redirect($transaction->data->link);
    }


    public function getPaymentStatus()
    {
        // verify the amount paid
        // verify every other details here
        // then proceed with the request processing
        dd(request()->input());
    }
}