<?php

namespace GriffonTech\User\Http\Controllers;

use GriffonTech\User\Repositories\UserRepository;

/**
 * User controller for the customer basically for the tasks of users which will be
 * done after customer authentication.
 *
 * @author    Johnbosco Omebe <johnboscoomebe@thegriffontechnology.com>
 * @copyright 2020 Griffon Technologies Nig (http://www.thegriffontechnologies.com)
 */
class UserController extends Controller {
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * CustomerRepository object
     *
     * @var Object
     */
    protected $userRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \GriffonTech\User\Repositories\UserRepository $userRepository
     //* @param  \GriffonTech\Product\Repositories\ProductReviewRepository $productReview
     * @return void
     */
    public function __construct(UserRepository $userRepository /*ProductReviewRepository $productReviewRepository*/)
    {
        $this->middleware('user');

        $this->_config = request('_config');

        $this->userRepository = $userRepository;
    }

    /**
     * Taking the customer to profile details page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = $this->userRepository->find(auth()->guard('user')->user()->id);

        return view($this->_config['view'], compact('user'));
    }

    /**
     * For loading the edit form page.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $customer = $this->userRepository->find(auth()->guard('user')->user()->id);

        return view($this->_config['view'], compact('customer'));
    }

    /**
     * Edit function for editing customer profile.
     *
     * @return response
     */
    public function update()
    {
        $id = auth()->guard('user')->user()->id;

        $this->validate(request(), [
            'name' => 'string',
            'last_name' => 'string',
            'email' => 'email|unique:users,email,'.$id,
            'old_password' => 'required_with:password',
            'password' => 'nullable:confirmed|min:6'
        ]);

        $data = collect(request()->input())->except('_token')->toArray();

        if ($data['old_password'] != "" || $data['old_password'] != null) {
            if(Hash::check($data['old_password'], auth()->guard('user')->user()->password)) {
                $data['password'] = bcrypt($data['password']);
            } else {
                session()->flash('warning', trans('shop::app.user.account.profile.unmatch'));

                return redirect()->back();
            }
        } else {
            unset($data['password']);
        }

        if ($this->userRepository->update($data, $id)) {
            Session()->flash('success', trans('shop::app.user.account.profile.edit-success'));

            return redirect()->route($this->_config['redirect']);
        } else {
            Session()->flash('success', trans('shop::app.user.account.profile.edit-fail'));

            return redirect()->back($this->_config['redirect']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = auth()->guard('user')->user()->id;

        $data = request()->all();

        $userRepository = $this->userRepository->findorFail($id);


        try {
            if ( Hash::check($data['password'], $userRepository->password) ) {

                $this->userRepository->delete($id);

                session()->flash('success', trans('admin::app.response.delete-success', ['name' => 'Customer']));

                return redirect()->route('user.session.index');
            } else {
                session()->flash('error', trans('shop::app.user.account.address.delete.wrong-password'));
            }

            return redirect()->route('user.session.index');
        } catch(\Exception $e) {
            session()->flash('error', trans('admin::app.response.delete-failed', ['name' => 'Customer']));

            return redirect()->route($this->_config['redirect']);
        }
    }


}
