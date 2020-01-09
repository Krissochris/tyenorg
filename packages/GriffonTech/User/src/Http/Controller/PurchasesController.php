<?php

namespace GriffonTech\User\Http\Controllers;


class PurchasesController extends Controller
{

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
    protected $purchaseRepository;


    public function __construct()
    {
        $this->_config = request('_config');
    }


    public function index()
    {
        return view($this->_config['view']);
    }

}