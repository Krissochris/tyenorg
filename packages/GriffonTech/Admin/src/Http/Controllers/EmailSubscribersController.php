<?php


namespace GriffonTech\Admin\Http\Controllers;


use GriffonTech\User\Repositories\EmailSubscriptionRepository;

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

}
