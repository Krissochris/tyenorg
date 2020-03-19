<?php


namespace GriffonTech\Admin\Http\Controllers;


use GriffonTech\Tutor\Repositories\TutorProfileRepository;
use GriffonTech\User\Contracts\User;
use GriffonTech\User\Repositories\UserPaymentDetailRepository;
use GriffonTech\User\Repositories\UserRepository;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    protected $_config;

    protected $userRepository;

    protected $tutorProfileRepository;

    protected $userPaymentDetailRepository;

    public function __construct(
        UserRepository $userRepository,
        TutorProfileRepository $tutorProfileRepository,
        UserPaymentDetailRepository $userPaymentDetailRepository
    )
    {
        $this->_config = request('_config');

        $this->userRepository = $userRepository;

        $this->tutorProfileRepository = $tutorProfileRepository;

        $this->userPaymentDetailRepository = $userPaymentDetailRepository;

    }

    public function index()
    {
        $users = $this->userRepository->paginate(30);
        return view($this->_config['view'])->with(compact('users'));
    }


    public function create()
    {
        return view($this->_config['view']);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'username' => 'string|required',
            'email' => 'string|required',
            'password' => 'confirmed|required|min:6'
        ]);

        $user = $this->userRepository->create($request->input());

        if ($user) {
            session()->flash('success', 'User was successfully created!');
        } else {
            session()->flash('error', 'User could not be created. Please try again');
        }
        return redirect()->route($this->_config['redirect']);
    }


    public function show(User $user)
    {
        return view($this->_config['view'], compact('user'));
    }


    public function edit(User $user)
    {
        $tutors = $this->tutorProfileRepository
            ->pluck('name', 'id')
            ->prepend('--Select Tutor --', '');

        $userPaymentDetail = $this->userPaymentDetailRepository
            ->findOneByField('user_id', $user->id);


        return view($this->_config['view'],
            compact('user', 'tutors', 'userPaymentDetail'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $userUpdated = $user->update($request->input());
        if ($userUpdated) {
            session()->flash('success', 'User was successfully updated!');
        } else {
            session()->flash('error', 'User could not be updated. Please try again.');
        }
        return redirect()->route($this->_config['redirect'], $user->id);
    }



    public function destroy()
    {
        return view($this->_config['view']);
    }


    public function proUserUpdate(Request $request, User $user)
    {
        if ( (int)$request->input('is_pro_user') === 1 ) {
            if ($user->makeProUser()) {
                session()->flash('success', 'User was successfully made a pro user');
            } else {
                session()->flash('error', 'User could not be made a pro user. Please try again');
            }

        } else if ((int)$request->input('is_pro_user') === 0) {
            $user->removeProUser();
        }
        return back();
    }

    public function updatePaymentDetail(Request $request, $id)
    {
        $userPaymentDetail = $this->userPaymentDetailRepository
            ->findOneByField('user_id', $id);

        if ($userPaymentDetail) {
            $userPaymentDetail = $userPaymentDetail->update($request->input());
        } else {
            $postData = $request->input();
            $postData['user_id'] = $id;
            $userPaymentDetail = $this->userPaymentDetailRepository->create($postData);
        }
        if ($userPaymentDetail) {
            session()->flash('success', 'User payment details was successfully updated.');
        } else {
            session()->flash('error', 'User payment details could not be updated.');
        }
        return back();
    }
}
