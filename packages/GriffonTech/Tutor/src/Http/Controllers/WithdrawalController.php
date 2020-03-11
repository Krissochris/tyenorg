<?php


namespace GriffonTech\Tutor\Http\Controllers;


use GriffonTech\Tutor\Http\Controllers\Controller;
use GriffonTech\Tutor\Repositories\TutorWithdrawalRepository;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    protected $_config;

    protected $tutorWithdrawalRepository;

    public function __construct(
        TutorWithdrawalRepository $tutorWithdrawalRepository
    )
    {
        $this->tutorWithdrawalRepository = $tutorWithdrawalRepository;

        $this->_config = \request('_config');
    }


    public function index()
    {
        return view($this->_config['view']);
    }


    public function create()
    {
        return view($this->_config['view']);
    }


    public function store(Request $request)
    {

        return redirect()->route($this->_config['redirect']);
    }

}
