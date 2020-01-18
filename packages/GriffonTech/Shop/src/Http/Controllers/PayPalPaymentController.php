<?php

namespace GriffonTech\Shop\Http\Controllers;

use App\User;
use GriffonTech\User\Repositories\UserPaymentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use GriffonTech\Course\Facades\CourseRegistration;

class PayPalPaymentController extends Controller
{
    private $_api_context;

    protected $userPaymentRepository;

    public function __construct(
        UserPaymentRepository $userPaymentRepository
    )
    {

        $this->userPaymentRepository = $userPaymentRepository;

        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret']
        ));

        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function process()
    {
        if (!request()->session()->exists('payment')) {

            session()->flash('error','Invalid action');

            return redirect('/');
        }
        $payment_details = request()->session()->get('payment');

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($payment_details['amount']);
        $amount->setCurrency('USD');

        $transaction = new Transaction();
        $transaction->setAmount($amount);

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(URL::to(route('payment.pay_pal.status')))
            ->setCancelUrl(URL::to(route('payment.pay_pal.status')));

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->_api_context);

            // process the payment

        } catch (PayPalConnectionException $pay_pal_exception) {

            if (Config::get('app.debug')) {
                session()->flash('error','Connection timeout');
                return redirect('/');
            } else {
                // log the error
                session()->flash('error', 'Some error occurred, sorry for the inconvenience');
                return redirect('/');
            }
        }
        if ($payment->getApprovalLink()) {
            $redirect_url = $payment->getApprovalLink();
        }

        /** add payment ID to session */
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {
            return Redirect::away($redirect_url);
        }
        session()->flash('error', 'Unknown error occurred');
        return Redirect::to('/');
    }

    public function getPaymentStatus()
    {
        $payment_id = Session::get('paypal_payment_id');
        $payment_details = request()->session()->get('payment');

        Session::forget('paypal_payment_id');

        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            session()->flash('error', 'Payment failed');
            return Redirect::to('/');
        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        /** Execute the payment */
        try {
            $result = $payment->execute($execution, $this->_api_context);

        } catch (PayPalConnectionException $pay_pal_exception) {
            // handle paypal connection error.
        }

        if ($result->getState() == 'approved') {
            $payment_details = request()->session()->get('payment');

            Session::forget('payment');

            //record the payment detail
            $this->userPaymentRepository->create([
                'user_id' => $payment_details['user_id'],
                'payment_purpose' => $payment_details['purpose'],
                'medium_of_payment' => 'paypal',
                'amount' => $payment_details['amount']
            ]);

            if ($payment_details['purchase_type'] === 'course_purchase') {
                CourseRegistration::registerStudent($payment_details['item_no'], $payment_details['user_id']);
            }
            session()->flash('success','Payment success');
            return redirect('/');
        }
        session()->flash('error', 'Payment failed');
        return redirect('/');
    }
}
