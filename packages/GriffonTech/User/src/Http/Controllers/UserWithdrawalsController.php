<?php


namespace GriffonTech\User\Http\Controllers;


use GriffonTech\User\Repositories\UserReferralRepository;
use GriffonTech\User\Repositories\UserWithdrawalRepository;
use Illuminate\Http\Request;

class UserWithdrawalsController extends Controller
{
    protected $_config;

    protected $userReferralRepository;

    protected $userWithdrawalRepository;

    public function __construct(
        UserReferralRepository $userReferralRepository,
        UserWithdrawalRepository $userWithdrawalRepository
    )
    {
        $this->_config = request('_config');

        $this->userReferralRepository = $userReferralRepository;

        $this->userWithdrawalRepository = $userWithdrawalRepository;
    }


    public function index()
    {
        $userWithdrawals = $this->userWithdrawalRepository
            ->findWhere([
                'user_id' => auth('user')->user()->id
            ]);


        $user_referral = $this->userReferralRepository->firstOrCreate([
            'user_id' => auth('user')->user()->id
        ]);

        return view($this->_config['view'])
            ->with(compact('userWithdrawals', 'user_referral'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required'
        ]);

        $user_referral = $this->userReferralRepository->firstOrCreate([
            'user_id' => auth('user')->user()->id
        ]);

        if ($request->input('amount') > $user_referral->referral_bonus) {
            session()->flash('error', 'Request amount is greater than your available referral bonus');
            return back();
        }

        $activeUserWithdrawal = $this->userWithdrawalRepository
            ->findWhere([
                'user_id' => auth('user')->user()->id,
                'status' => 1
            ])->first();

        if ($activeUserWithdrawal) {
            session()->flash('error', 'You can only have one active withdrawal at a time.');
            return back();
        }

        $userWithdrawal = $this->userWithdrawalRepository
            ->create([
                'amount' => $request->input('amount'),
                'user_id' => auth('user')->user()->id
            ]);

        if ($userWithdrawal) {
            session()->flash('success', 'Your withdrawal request was successful. ');
        } else {
            session()->flash('error', 'Your withdrawal request could not be created. Please try again');
        }

        return back();
    }

}
