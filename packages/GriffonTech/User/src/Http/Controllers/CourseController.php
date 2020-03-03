<?php

namespace GriffonTech\User\Http\Controllers;
use GriffonTech\Course\Repositories\CourseRegistrationRepository;
use GriffonTech\Course\Repositories\CourseRepository;
use GriffonTech\Course\Repositories\CourseReviewRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

    protected $courseReviewRepository;


    public function __construct(
        CourseRepository $courseRepository,
        CourseRegistrationRepository $courseRegistrationRepository,
        CourseReviewRepository $courseReviewRepository
    )
    {
        $this->middleware('user');

        $this->_config = request('_config');

        $this->courseRepository = $courseRepository;

        $this->courseRegistrationRepository = $courseRegistrationRepository;

        $this->courseReviewRepository = $courseReviewRepository;

    }

    public function index()
    {
        $courses = $this->courseRegistrationRepository->getUserCourses(auth('user')->user()->id);

        return view($this->_config['view'])->with(compact('courses'));
    }

    /**
     * This is used to view a course
     */
    public function show($slug)
    {
        try {
            $course = $this->courseRepository->findBySlugOrFail($slug);

        } catch (ModelNotFoundException $exception) {
            abort(404);
        }
        $courseRegistration = $this->courseRegistrationRepository
            ->with(['course_batch'])
            ->findOneWhere([
            'course_id' => $course->id,
            'user_id' => auth('user')->user()->id
        ]);
        if (!$courseRegistration) {
            return back();
        }
        if (isset($courseRegistration->course_batch->id)) {

            $course_review = $this->courseReviewRepository
                ->findOneWhere([
                    'course_id' => $course->id,
                    'user_id' => $courseRegistration->user_id,
                    'course_batch_id' => $courseRegistration->course_batch->id
                ]);
        }

        return view($this->_config['view'], compact('course', 'courseRegistration', 'course_review'));
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
