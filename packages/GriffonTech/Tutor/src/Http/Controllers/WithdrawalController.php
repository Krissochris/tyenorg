<?php


namespace GriffonTech\Tutor\Http\Controllers;


use GriffonTech\Tutor\Http\Controllers\Controller;
use GriffonTech\Tutor\Repositories\TutorProfileRepository;
use GriffonTech\Tutor\Repositories\TutorWithdrawalRepository;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    protected $_config;

    protected $tutorWithdrawalRepository;

    protected $tutorProfileRepository;

    public function __construct(
        TutorWithdrawalRepository $tutorWithdrawalRepository,
        TutorProfileRepository $tutorProfileRepository
    )
    {
        $this->tutorWithdrawalRepository = $tutorWithdrawalRepository;

        $this->tutorProfileRepository = $tutorProfileRepository;

        $this->_config = \request('_config');
    }


    public function index()
    {
        $withdrawals = $this->tutorWithdrawalRepository
            ->findWhere([
                'tutor_id' => auth('user')->user()->tutor_id
            ]);

        return view($this->_config['view'])->with(compact('withdrawals'));
    }


    public function create()
    {
        $tutorProfile = $this->tutorProfileRepository
            ->findOneByField('id', auth('user')->user()->tutor_id,
                ['tutor_id', 'amount_balance']);
        return view($this->_config['view'])->with(compact('tutorProfile'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required'
        ]);

        $tutorProfile = $this->tutorProfileRepository
            ->findOneByField('id', auth('user')->user()->tutor_id,
                ['tutor_id', 'amount_balance']);

        if ($request->input('amount') > $tutorProfile->amount_balance) {
            session()->flash('error', 'Amount is greater than your available balance.');
            return back();
        }

        $activeWithdrawal = $this->tutorWithdrawalRepository->findOneWhere([
            'tutor_id' => $tutorProfile->id,
            'status' => 1
        ])->first();

        if ($activeWithdrawal) {
            session()->flash('error', 'You can only have one active withdrawal at the a time.');
            return back();
        }

        $withdrawal = $tutorProfile->withdrawals()
            ->create(['amount' => $request->input('amount')]);

        if ($withdrawal) {
            session()->flash('success', 'Your withdrawal request was successfully created. Please be patient while we process your order. Thank you.');
        } else {
            session()->flash('error', 'We are sorry to inform you that we could n\'t create your withdrawal request at this time.');
        }

        return redirect()->route($this->_config['redirect']);
    }

}
