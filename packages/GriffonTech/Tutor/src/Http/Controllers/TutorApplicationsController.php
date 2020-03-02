<?php


namespace GriffonTech\Tutor\Http\Controllers;


use GriffonTech\Tutor\Repositories\TutorApplicationRepository;
use Illuminate\Http\Request;

/**
 * Tutor Application
 *
 * @author    Johnbosco Omebe <johnboscoomebe@thegriffontechnology.com>
 * @copyright 2020 Griffon Technologies Nig (http://www.thegriffontechnologies.com)
 */
class TutorApplicationsController extends Controller
{

    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * TutorApplicationRepository object
     *
     * @var Object
     */
    protected $tutorApplicationRepository;

    public function __construct(
        TutorApplicationRepository $tutorApplicationRepository)
    {
        $this->_config = request('_config');

        $this->tutorApplicationRepository = $tutorApplicationRepository;
    }

    public function index()
    {

    }

    public function create()
    {
        return view($this->_config['view']);
    }

    public function save(Request $request)
    {

    }

    public function submit(Request $request)
    {

    }
}
