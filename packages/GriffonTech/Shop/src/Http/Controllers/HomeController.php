<?php
namespace GriffonTech\Shop\Http\Controllers;

class HomeController extends Controller {

    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->_config = request('_config');
    }


    public function index()
    {
        return view($this->_config['view']);
    }
}