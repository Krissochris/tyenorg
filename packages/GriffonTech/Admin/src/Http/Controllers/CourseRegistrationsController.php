<?php


namespace GriffonTech\Admin\Http\Controllers;


use GriffonTech\Course\Repositories\CourseRegistrationRepository;

class CourseRegistrationsController extends Controller
{

    protected $_config;

    protected $courseRegistrationRepository;

    public function __construct(
        CourseRegistrationRepository $courseRegistrationRepository
    )
    {
        $this->_config = request('_config');

        $this->courseRegistrationRepository = $courseRegistrationRepository;
    }

    public function index()
    {
        $course_registrations = $this->courseRegistrationRepository
            ->get();

        return view($this->_config['view'])
            ->with(compact('course_registrations'));
    }

}
