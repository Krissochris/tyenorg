<?php

namespace GriffonTech\Course\Http\Controllers;

use GriffonTech\Course\Repositories\CourseCategoryRepository;
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

    /**
     * courseCategoryRepository object
     *
     * @var Object
     */
    protected $courseCategoryRepository;

    public function __construct(
        CourseRepository $courseRepository,
        CourseCategoryRepository $courseCategoryRepository
    )
    {
        $this->_config = request('_config');

        $this->courseRepository = $courseRepository;

        $this->courseCategoryRepository = $courseCategoryRepository;
    }


    public function index()
    {
        $courseCategories = $this->courseCategoryRepository->all(['id', 'name', 'url_key']);

        $courses = $this->courseRepository->all();
        return view($this->_config['view'], compact('courseCategories', 'courses'));
    }

    public function show()
    {

    }

    public function create()
    {

    }


}