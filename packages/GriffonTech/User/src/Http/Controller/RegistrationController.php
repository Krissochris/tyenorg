<?php
namespace GriffonTech\User\Http\Controllers;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use GriffonTech\User\Mail\RegistrationEmail;
use GriffonTech\User\Mail\VerificationEmail;
use GriffonTech\User\Repositories\UserRepository;


class RegistrationController extends Controller {

    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * UserRepository object
     *
     * @var Object
     */
    protected $userRepository;


    /**
     * Create a new Repository instance.
     *
     * @param  \GriffonTech\User\Repositories\UserRepository  $userRepository
     * @return void
     */
    public function __construct(
        UserRepository $userRepository
    )
    {
        $this->_config = request('_config');

        $this->userRepository = $userRepository;
    }

    /**
     * Opens up the user's sign up form.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view($this->_config['view']);
    }


    /**
     * Method to store user's sign up form data to DB.
     *
     * @return Response
     */
    public function create()
    {
        $this->validate(request(), [
            'name' => 'string|required',
            'username' => 'string|required|unique:users,username',
            'email' => 'email|required|unique:users,email',
            'password' => 'confirmed|min:6|required',
        ]);

        $data = request()->input();

        $data['password'] = bcrypt($data['password']);

        // Activate this later
        /*if (core()->getConfigData('customer.settings.email.verification')) {
            $data['is_verified'] = 0;
        } else {
            $data['is_verified'] = 1;
        }*/

        //$data['customer_group_id'] = $this->userGroupRepository->findOneWhere(['code' => 'general'])->id;

        $verificationData['email'] = $data['email'];
        $verificationData['token'] = md5(uniqid(rand(), true));
        $data['token'] = $verificationData['token'];

        Event::fire('customer.registration.before');

        $user = $this->userRepository->create($data);

        Event::fire('customer.registration.after', $user);

        if ($user) {
            if (/*core()->getConfigData('customer.settings.email.verification')*/false) {
                try {
                    Mail::queue(new VerificationEmail($verificationData));

                    session()->flash('success', trans('shop::app.user.signup-form.success-verify'));
                } catch (\Exception $e) {
                    session()->flash('info', trans('shop::app.user.signup-form.success-verify-email-unsent'));
                }
            } else {
                try {
                    Mail::queue(new RegistrationEmail(request()->all()));

                    session()->flash('success', trans('shop::app.user.signup-form.success-verify')); //customer registered successfully
                } catch (\Exception $e) {
                    session()->flash('info', trans('shop::app.user.signup-form.success-verify-email-unsent'));
                }

                session()->flash('success', trans('shop::app.user.signup-form.success'));
            }

            return redirect()->route($this->_config['redirect']);
        } else {
            session()->flash('error', trans('shop::app.user.signup-form.failed'));

            return redirect()->back();
        }
    }


    /**
     * Method to verify account
     *
     * @param string $token
     */
    public function verifyAccount($token)
    {
        $user = $this->userRepository->findOneByField('token', $token);

        if ($user) {
            $user->update(['is_verified' => 1, 'token' => 'NULL']);

            session()->flash('success', trans('shop::app.user.signup-form.verified'));
        } else {
            session()->flash('warning', trans('shop::app.user.signup-form.verify-failed'));
        }

        return redirect()->route('user.session.index');
    }

    public function resendVerificationEmail($email)
    {
        $verificationData['email'] = $email;
        $verificationData['token'] = md5(uniqid(rand(), true));

        $customer = $this->userRepository->findOneByField('email', $email);

        $this->userRepository->update(['token' => $verificationData['token']], $customer->id);

        try {
            Mail::queue(new VerificationEmail($verificationData));

            if (Cookie::has('enable-resend')) {
                \Cookie::queue(\Cookie::forget('enable-resend'));
            }

            if (Cookie::has('email-for-resend')) {
                \Cookie::queue(\Cookie::forget('email-for-resend'));
            }
        } catch (\Exception $e) {
            session()->flash('error', trans('shop::app.user.signup-form.verification-not-sent'));

            return redirect()->back();
        }
        session()->flash('success', trans('shop::app.user.signup-form.verification-sent'));

        return redirect()->back();
    }

}