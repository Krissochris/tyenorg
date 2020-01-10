<?php

namespace GriffonTech\Course\Http\Controllers;

use GriffonTech\Course\Repositories\CourseRepository;

/**
 * Course controller for the user courses basically for the tasks of users which will be
 * done after customer authentication.
 *
 * @author    Johnbosco Omebe <johnboscoomebe@thegriffontechnology.com>
 * @copyright 2020 Griffon Technologies Nig (http://www.thegriffontechnologies.com)
 */
class CourseController extends Controller
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * CustomerRepository object
     *
     * @var Object
     */
    protected $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        $this->_config = request('_config');

        $this->courseRepository = $courseRepository;
    }


    public function index()
    {
        return view($this->_config['view']);
    }

    public function show()
    {

    }

    public function create()
    {

    }


}