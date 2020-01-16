<?php

namespace GriffonTech\User\Http\Controllers;


use GriffonTech\User\Repositories\UserPaymentRepository;

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
    protected $userPaymentRepository;


    public function __construct(
        UserPaymentRepository $userPaymentRepository
    )
    {
        $this->_config = request('_config');

        $this->userPaymentRepository = $userPaymentRepository;
    }


    public function index()
    {

        $userPayments = $this->userPaymentRepository
            ->findWhere(['user_id' => auth('user')->user()->id]);

        return view($this->_config['view'], compact('userPayments'));
    }

}