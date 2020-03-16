<?php


namespace GriffonTech\Admin\Http\Controllers;


use GriffonTech\Tutor\Repositories\TutorWithdrawalRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TutorWithdrawalsController extends Controller
{

    protected $_config;

    protected $tutorWithdrawalRepository;


    public function __construct(
        TutorWithdrawalRepository $tutorWithdrawalRepository
    )
    {
        $this->_config = request('_config');

        $this->tutorWithdrawalRepository = $tutorWithdrawalRepository;
    }


    public function index()
    {
        $tutorWithdrawals = $this->tutorWithdrawalRepository
            ->getModel()
            ->orderBy('created_at')
            ->get();

        return view($this->_config['view'])
            ->with(compact('tutorWithdrawals'));
    }


    public function edit($id)
    {
        $tutorWithdrawal = $this->tutorWithdrawalRepository
            ->with(['tutor_profile'])
            ->findOrFail($id);

        return view($this->_config['view'])
            ->with(compact('tutorWithdrawal'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);

        $tutorWithdrawal = $this->tutorWithdrawalRepository
            ->with(['tutor_profile'])
            ->findOrFail($id);

        $postData = $request->only(['status', 'note']);
        try {
            DB::beginTransaction();

            if ( 1 === (int) $postData['status'] ) {

                if ($tutorWithdrawal->tutor_profile->debit($tutorWithdrawal->amount)) {
                    session()->flash('success', 'Withdrawal amount was successfully debited from the user account');
                } else {
                    throw new \Exception('Could not successfully debit the tutor account.');
                }

                $updated = $tutorWithdrawal->update([
                    'note' => $postData['note'],
                    'status' => 2
                ]);

                if (!$updated) {
                    throw new \Exception('Could not update the withdrawal record.');
                }

            } else if (-1 === (int) $postData['status']) {
                $updated = $tutorWithdrawal->update([
                    'note' => $postData['note'],
                    'status' => -1
                ]);

                if (!$updated) {
                    throw new \Exception('Could not update the withdrawal record');
                }
            }

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            session()->flash('error', $exception->getMessage());

            return back();
        }

        return redirect()->route($this->_config['redirect']);
    }

}
