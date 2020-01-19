<?php

namespace GriffonTech\Testimony\Http\Controllers;


use GriffonTech\Testimony\Repositories\TestimonyRepository;
use GriffonTech\User\Repositories\UserRepository;
use Illuminate\Http\Request;

class TestimoniesController extends Controller
{

    protected $_config;

    protected $testimonyRepository;


    protected $userRepository;


    public function __construct(
        TestimonyRepository $testimonyRepository,
        UserRepository $userRepository
    )
    {

        $this->_config = request('_config');

        $this->testimonyRepository = $testimonyRepository;

        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $testimonies = $this->testimonyRepository
            ->with(['user:id,name'])
            ->paginate(20);

        return view($this->_config['view'], compact('testimonies'));
    }


    public function create()
    {

        $users = $this->userRepository->pluck('name', 'id');

        $status = TestimonyRepository::STATUS;

        return view($this->_config['view'], compact('users', 'status'));
    }


    public function store(Request $request)
    {
        $this->validate($request,
            [
                'user_id' => 'required|integer',
                'testimony' => 'required|string'
            ]);

        $testimony = $this->testimonyRepository->create($request->input());

        if ($testimony) {
            session()->flash('success', 'Testimony was successfully created.');
        } else {
            session()->flash('error', 'Testimony could not be created. Pleas try again');
        }

        return redirect()->route($this->_config['redirect']);
    }



    public function edit($id)
    {
        $testimony = $this->testimonyRepository->findOrFail($id);

        $users = $this->userRepository->pluck('name', 'id');

        $status = TestimonyRepository::STATUS;

        return view($this->_config['view'], compact('testimony', 'status', 'users'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'user_id' => 'required|integer',
            'testimony' => 'required|string'
        ]);

        $testimony = $this->testimonyRepository->update($request->input(), $id);

        if ($testimony) {

            session()->flash('success', 'Testimony was successfully updated');
        } else {
            session()->flash('error', 'Testimony could not be updated!');
        }

        return redirect()->route($this->_config['redirect']);

    }

    public function destroy($id)
    {
        $testimony = $this->testimonyRepository->delete($id);

        if ($testimony) {
            session()->flash('success', 'Testimony was successfully deleted');
        } else {
            session()->flash('error', 'Testimony could not be deleted');
        }
        return redirect()->route($this->_config['redirect']);
    }

}