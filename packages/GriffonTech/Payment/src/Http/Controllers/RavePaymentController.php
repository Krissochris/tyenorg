<?php

namespace GriffonTech\Payment\Http\Controllers;

use App\RavePayment;
use GriffonTech\Course\Facades\CourseRegistration;
use GriffonTech\User\Repositories\UserPaymentRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use GriffonTech\User\Helpers\ProUserHandler;
class RavePaymentController extends Controller
{

    protected $_publicKey;

    protected $_secretKey;

    protected $userPaymentRepository;


    public function __construct(
        UserPaymentRepository $userPaymentRepository
    )
    {
        $config = config('rave_payment');

        $this->_publicKey = $config['public_key'];

        $this->_secretKey = $config['secret_key'];

        $this->userPaymentRepository = $userPaymentRepository;
    }


    public function process()
    {
        if (!request()->session()->exists('payment')) {

            session()->flash('error','Invalid action');

            return redirect('/');
        }
        $payment_details = request()->session()->get('payment');

        $postData = [
            'amount'=>$payment_details['amount'],
            'customer_email'=>$payment_details['customer_email'],
            'currency'=> $payment_details['currency'],
            'txref'=> Str::uuid(),
            'PBFPubKey'=> $this->_publicKey,
            'redirect_url'=>route('payment.rave_pay.status'),
        ];

        if ($payment_details['purchase_type'] == 'course_purchase') {
            $postData['meta'] = [
                json_encode(['purchase_type' => $payment_details['purchase_type'],
                    'course_id' => $payment_details['item_no']
                ])
            ];
        }

        $curl = curl_init();

        $redirect_url = route('payment.rave_pay.status');
        //$payment_plan = "pass the plan id"; // this is only required for recurring payments.

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($postData),
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


    /**
     * The payment status page
     */
    public function getPaymentStatus()
    {
        $payment_details = request()->session()->get('payment');
        Session::forget('payment');

        $txref = request()->get('txref');
        if (isset($txref) && !empty($txref)) {
            $resp = json_decode(request()->input('resp'), true);

            $amount = $payment_details["amount"];
            $currency = $payment_details["currency"];

            $paymentStatus = $resp['data']['data']['status'];
            $chargeResponsecode = $resp['tx']['chargeResponseCode'];
            $chargeAmount = $resp['tx']['amount'];
            $chargeCurrency = $resp['tx']['currency'];

            // save the transaction in the database

            if ( ($paymentStatus == 'successful') && ($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {

                //record the payment detail
                $this->userPaymentRepository->create([
                    'user_id' => $payment_details['user_id'],
                    'payment_purpose' => $payment_details['purpose'],
                    'medium_of_payment' => 'rave_payment',
                    'amount' => $payment_details['amount']
                ]);

                if ($payment_details['purchase_type'] === 'course_purchase') {
                    CourseRegistration::registerStudent($payment_details['item_no'], $payment_details['user_id']);

                } elseif ($payment_details['purchase_type'] === 'pro_user_package_purchase') {
                    $proUserHandler =  app('GriffonTech\User\Helpers\ProUserHandler');

                    $proUserHandler->becomeProUser($payment_details['user_id']);

                    session()->flash('success', 'Account was successfully upgraded to pro user.');
                }

                return redirect()->route('payment.success', ['amount' => $payment_details['amount']]);
                // transaction was successful...
                // please check other things like whether you already gave value for this ref
                // if the email matches the customer who owns the product etc
                //Give Value and return to Success page
            } else {
                //Dont Give Value and return to Failure page
                session()->flash('error', 'Payment failed');
            }
        }
        else {
            session()->flash('error', 'Payment failed');
        }
        return redirect('/');
    }
}
