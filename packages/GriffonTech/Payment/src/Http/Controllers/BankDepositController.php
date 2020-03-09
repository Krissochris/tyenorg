<?php


namespace GriffonTech\Payment\Http\Controllers;


class BankDepositController extends Controller
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
}
