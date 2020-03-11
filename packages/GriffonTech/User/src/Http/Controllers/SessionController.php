<?php
namespace GriffonTech\User\Http\Controllers;

use GriffonTech\User\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Cookie;

class SessionController extends Controller {

    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    protected $userRepository;
    /**
     * Create a new Repository instance.
     * @param $userRepository
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('user')->except(['show','create']);

        $this->_config = request('_config');

        $this->userRepository = $userRepository;
    }

    /**
     * Display the resource.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        if (auth()->guard('user')->check()) {
            return redirect()->route('user.profile.index');
        } else {
            if (strpos(url()->previous(), 'courses') !== false) {
                $intendedUrl = url()->previous();
                session()->put('url.intended', $intendedUrl);
            }
            return view($this->_config['view']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if (! auth()->guard('user')->attempt(request(['email', 'password']))) {
            session()->flash('error', trans('shop::app.user.login-form.invalid-creds'));

            return redirect()->back();
        }

        if (auth()->guard('user')->user()->status == 0) {
            auth()->guard('user')->logout();

            session()->flash('warning', trans('shop::app.user.login-form.not-activated'));

            return redirect()->back();
        }

        /*if (auth()->guard('user')->user()->is_verified == 0) {
            session()->flash('info', trans('shop::app.user.login-form.verify-first'));

            Cookie::queue(Cookie::make('enable-resend', 'true', 1));

            Cookie::queue(Cookie::make('email-for-resend', request('email'), 1));

            auth()->guard('user')->logout();

            return redirect()->back();
        }*/

        //Event passed to prepare cart after login
        //Event::fire('customer.after.login', request('email'));

        return redirect()->intended(route($this->_config['redirect']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        auth()->guard('user')->logout();

        //Event::fire('customer.after.logout', $id);

        return redirect()->route($this->_config['redirect']);
    }

    public function verifyAccount()
    {
        return view($this->_config['view']);
    }

    public function changeEmail(Request $request)
    {
        $request->validate([
            'email' => 'email|required|unique:users,email'
        ]);

        $emailUpdated = $this->userRepository
            ->update(['email' => $request->input('email')], auth('user')->user()->id);
        if ($emailUpdated) {
            session()->flash('success', 'Email was successfully change');
        } else {
            session()->flash('error', 'Email could not be change.');
        }
        return redirect()->route($this->_config['redirect']);
    }
}

