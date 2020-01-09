<?php

namespace GriffonTech\User\Http\Controllers;
use GriffonTech\Course\Repositories\CourseRegistrationRepository;
use GriffonTech\Course\Repositories\CourseRepository;

/**
 * Course controller for the user courses basically for the tasks of users which will be
 * done after customer authentication.
 *
 * @author    Johnbosco Omebe <johnboscoomebe@thegriffontechnology.com>
 * @copyright 2020 Griffon Technologies Nig (http://www.thegriffontechnologies.com)
 */
class CourseController extends Controller {

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


    protected $courseRegistrationRepository;


    public function __construct(
        CourseRepository $courseRepository,
        CourseRegistrationRepository $courseRegistrationRepository
    )
    {
        $this->middleware('user');

        $this->_config = request('_config');

        $this->courseRepository = $courseRepository;

        $this->courseRegistrationRepository = $courseRegistrationRepository;

    }

    public function index()
    {
        $courses = $this->courseRegistrationRepository->getUserCourses(auth('user')->user()->id);

        return view($this->_config['view'])->with(compact('courses'));
    }

    /**
     * This is used to view a course
     */
    public function show()
    {

    }


    /**
     * This is used to register to a course
     */
    public function create()
    {

    }


    /**
     * This is used to terminate access to a registered course
     */
    public function destroy()
    {

    }

}