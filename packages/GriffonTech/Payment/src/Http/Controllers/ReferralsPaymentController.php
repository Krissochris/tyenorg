<?php


namespace GriffonTech\Payment\Http\Controllers;


use GriffonTech\Course\Facades\CourseRegistration;
use GriffonTech\Course\Repositories\CourseRepository;
use GriffonTech\User\Repositories\UserPaymentRepository;
use GriffonTech\User\Repositories\UserReferralRepository;
use Illuminate\Support\Facades\DB;

class ReferralsPaymentController extends Controller
{

    protected $_config;

    protected $courseRepository;

    protected $userReferralRepository;

    protected $userPaymentRepository;

    public function __construct(
        CourseRepository $courseRepository,
        UserReferralRepository $userReferralRepository,
        UserPaymentRepository $userPaymentRepository
    )
    {
        $this->courseRepository = $courseRepository;

        $this->userReferralRepository = $userReferralRepository;

        $this->userPaymentRepository = $userPaymentRepository;
    }

    public function index()
    {
        if (!request()->session()->exists('payment')) {

            session()->flash('error','Invalid action');

            return back();
        }

        $payment_details = request()->session()->get('payment');

        // get the course details
        $course = $this->courseRepository->findOrFail($payment_details['item_no']);

        if ($course->total_no_of_referrals_needed < 0) {
            return back();
        }

        $user_referral = $this->userReferralRepository
            ->findOneByField('user_id', auth('user')->user()->id);

        if ($user_referral->available_referral >= $course->total_no_of_referrals_needed) {
            $user_referral->available_referral = $user_referral->available_referral - $course->total_no_of_referrals_needed;

            try {
                DB::beginTransaction();

                if (!$user_referral->update()) {
                    throw new \Exception('We could not update the referral record');
                }
                //record the payment detail
                $this->userPaymentRepository->create([
                    'user_id' => $payment_details['user_id'],
                    'payment_purpose' => $payment_details['purpose'],
                    'medium_of_payment' => 'referral',
                    'amount' => $payment_details['amount']
                ]);

                $courseRegistered = CourseRegistration::registerStudent($payment_details['item_no'], $payment_details['user_id']);

                if (!$courseRegistered) {
                    throw new \Exception('Sorry we could complete the course registration');
                }
                DB::commit();
                session()->flash('success', ' You were successfully subscribed to the course. Thank you.');

                return redirect()->route('courses.index');
            } catch (\Exception $exception ) {
                DB::rollBack();

                session()->flash('error', 'We could not subscribe you to the course. Please try again.');

            }
        } else {
            session()->flash('error', 'Insufficient available referrals');
        }
        return back();
    }
}
