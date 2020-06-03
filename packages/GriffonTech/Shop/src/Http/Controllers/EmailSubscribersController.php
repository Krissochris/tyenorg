<?php


namespace GriffonTech\Shop\Http\Controllers;


use GriffonTech\User\Repositories\EmailSubscriptionRepository;
use Illuminate\Http\Request;

class EmailSubscribersController extends Controller
{

    protected $emailSubscriptionRepository;

    public function __construct(EmailSubscriptionRepository $emailSubscriptionRepository)
    {
        $this->emailSubscriptionRepository = $emailSubscriptionRepository;
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);

        $email_subscriber = $this->emailSubscriptionRepository->create($request->input());
        if ($email_subscriber) {
            if ($request->ajax()) {
                return response()->json([
                    'message' => 'success'
                ]);
            }
            session()->flash('success', 'Your email was successful saved!');
        } else {
            if ($request->ajax()) {
                return response()->json([
                    'message' => 'error'
                ]);
            }
            session()->flash('error', 'Your email could not be saved. Please try again.');
        }
        return back();
    }

}
