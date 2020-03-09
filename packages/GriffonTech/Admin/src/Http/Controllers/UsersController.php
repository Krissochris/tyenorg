<?php


namespace GriffonTech\Admin\Http\Controllers;


use GriffonTech\User\Contracts\User;
use GriffonTech\User\Repositories\UserRepository;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    protected $_config;

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->_config = request('_config');

        $this->userRepository = $userRepository;

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
        return view($this->_config['view'], compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $userUpdated = $user->update($request->input());
        if ($userUpdated) {
            if ( (int)$request->input('is_pro_user') === 1 ) {
                $user->makeProUser();
            } else if ((int)$request->input('is_pro_user') === 0) {
                $user->removeProUser();
            }
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
}
