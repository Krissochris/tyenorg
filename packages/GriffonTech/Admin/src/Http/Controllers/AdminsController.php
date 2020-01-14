<?php


namespace GriffonTech\Admin\Http\Controllers;


use GriffonTech\Admin\Repositories\AdminRepository;
use Illuminate\Http\Request;

class AdminsController extends Controller
{

    protected $_config;


    protected $adminRepository;

    public function __construct(
        AdminRepository $adminRepository
    )
    {
        $this->_config = request('_config');

        $this->adminRepository = $adminRepository;
    }



    public function index()
    {
        $admins = $this->adminRepository->paginate(15);
        return view($this->_config['view'], compact('admins'));
    }



    public function create()
    {
        return view($this->_config['view']);
    }

    public function show($id)
    {
        $admin = $this->adminRepository->findOrFail($id);

        return view($this->_config['view'], compact('admin'));
    }


    public function edit($id)
    {
        $admin = $this->adminRepository->findOrFail($id);

        return view($this->_config['view'], compact('admin'));
    }



    public function update(Request $request, $id)
    {
        $admin = $this->adminRepository->findOrFail($id);

        $adminUpdated = $admin->update($request->input());

        if ($adminUpdated) {
            session()->flash('success', 'Admin record was successfully updated');
        } else {
            session()->flash('error', 'Admin record could not be updated!');
        }
        return redirect()->route($this->_config['redirect'], $id);
    }


    public function store()
    {
        return view($this->_config['view']);
    }



    public function destroy()
    {
        return view($this->_config['view']);
    }



}
