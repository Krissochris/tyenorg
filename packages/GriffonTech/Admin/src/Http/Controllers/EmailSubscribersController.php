<?php


namespace GriffonTech\Admin\Http\Controllers;


use GriffonTech\User\Repositories\EmailSubscriptionRepository;
use Illuminate\Http\Request;

class EmailSubscribersController extends Controller
{

    protected $_config;

    protected $emailSubscriptionRepository;

    public function __construct(
        EmailSubscriptionRepository $emailSubscriptionRepository
    )
    {
        $this->emailSubscriptionRepository = $emailSubscriptionRepository;
        $this->_config = request('_config');
    }

    public function index()
    {
        // get all email subscribers
        // within the specified date
        // and also ability to export all in csv file.
        $emailSubscribers = $this->emailSubscriptionRepository->all();
        return view($this->_config['view'])->with(compact('emailSubscribers'));
    }


    public function generateCSV(Request $request)
    {
        $request->validate([
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        $email_subscribers = $this->emailSubscriptionRepository
            ->getModel()
            ->query()
            ->select(['email'])
            ->whereBetween('created_at', [$request->input('start_date'), $request->input('end_date')])
            ->get()
            ->toArray();

        if (empty($email_subscribers)) {
            session()->flash('error', 'Empty list');
            return back();
        }
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=email_subscribers.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $callback = function() use ($email_subscribers)
        {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['Email']);

            foreach($email_subscribers as $subscriber) {
                fputcsv($file, [$subscriber['email']]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

}
