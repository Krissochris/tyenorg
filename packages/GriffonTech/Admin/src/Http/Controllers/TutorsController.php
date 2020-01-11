<?php


namespace GriffonTech\Admin\Http\Controllers;


class TutorsController extends Controller
{

    protected $_config;

    public function __construct()
    {
        $this->_config = request('_config');
    }

    public function index()
    {
        return view($this->_config['view']);
    }

    public function create()
    {
        return view($this->_config['view']);
    }

    public function show()
    {
        return view($this->_config['view']);
    }
    public function edit()
    {
        return view($this->_config['view']);
    }

    public function update()
    {
        return view($this->_config['view']);
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
