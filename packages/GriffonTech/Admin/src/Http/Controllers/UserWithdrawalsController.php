<?php


namespace GriffonTech\Admin\Http\Controllers;


use GriffonTech\User\Repositories\UserWithdrawalRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserWithdrawalsController extends Controller
{

    protected $_config;

    protected $userWithdrawalRepository;

    public function __construct(
        UserWithdrawalRepository $userWithdrawalRepository
    )
    {
        $this->_config = request('_config');

        $this->userWithdrawalRepository = $userWithdrawalRepository;
    }


    public function index()
    {
        $userWithdrawals = $this->userWithdrawalRepository->get();

        return view($this->_config['view'])
            ->with(compact('userWithdrawals'));
    }

    public function edit($id)
    {
        $userWithdrawal = $this->userWithdrawalRepository
            ->findOrFail($id);

        return view($this->_config['view'])
            ->with(compact('userWithdrawal'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $userWithdrawal = $this->userWithdrawalRepository
            ->with(['user.user_referral'])
            ->findOrFail($id);

        $postData = $request->only(['status', 'note']);

        try {
            DB::beginTransaction();

            if (1 === (int) $postData['status']) {

                $userWithdrawal->user->user_referral->referral_bonus =
                    $userWithdrawal->user->user_referral->referral_bonus - $userWithdrawal->amount;

                if (!$userWithdrawal->user->user_referral->update()) {
                    throw new \Exception();
                }

                $userWithdrawal->forceFill([
                    'note' => $postData['note'],
                    'status' => 2
                ]);

                if (!$userWithdrawal->update()) {
                    throw new \Exception();
                }

            } elseif (-1 === (int) $postData['status']) {

                $userWithdrawal->forceFill([
                    'note' => $postData['note'],
                    'status' => -1
                ]);

                if (!$userWithdrawal->update()) {
                    throw new \Exception();
                }

            }
            DB::commit();
            session()->flash('success', 'user withdrawal was successfully updated.');

            return redirect()->route($this->_config['redirect']);

        } catch( \Exception $exception ) {
            DB::rollBack();
            session()->flash('error', 'An error occurred updating the user withdrawal. Please try again');
        }
    return back();
    }
}
