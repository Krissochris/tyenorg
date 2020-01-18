<?php

namespace GriffonTech\Shop\Http\Controllers;

use GriffonTech\Course\Repositories\CourseBatchRepository;
use GriffonTech\Course\Repositories\CourseCategoryRepository;
use GriffonTech\Course\Repositories\CourseRegistrationRepository;
use GriffonTech\Course\Repositories\CourseRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use GriffonTech\Course\Facades\CourseRegistration;
/**
 * Course controller
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

    /**
     * courseRegistrationRepository object
     *
     * @var Object
     */
    protected $courseRegistrationRepository;

    /**
     * courseBatchRepository object
     *
     * @var Object
     */
    protected $courseBatchRepository;



    public function __construct(
        CourseRepository $courseRepository,
        CourseCategoryRepository $courseCategoryRepository,
        CourseRegistrationRepository $courseRegistrationRepository,
        CourseBatchRepository $courseBatchRepository
    )
    {
        $this->_config = request('_config');

        $this->courseRepository = $courseRepository;

        $this->courseCategoryRepository = $courseCategoryRepository;

        $this->courseRegistrationRepository = $courseRegistrationRepository;
    }


    public function index()
    {
        $courseCategories = $this->courseCategoryRepository->all(['id', 'name', 'url_key']);

        $courses = $this->courseRepository->all();
        return view($this->_config['view'], compact('courseCategories', 'courses'));
    }

    public function show($slug)
    {
        try {
            $course = $this->courseRepository->findBySlugOrFail($slug);

        } catch (ModelNotFoundException $exception) {
            // handle the error
        }
        if (isset(auth('user')->user()->id)) {
            if (isset($course)) {
                $courseRegistered = $this->courseRegistrationRepository->findOneByField('course_id', $course->id, ['course_id']);
            }
        }

        return view($this->_config['view'])->with(compact('course', 'courseRegistered'));
    }

    public function join($slug)
    {
        try {
            $course = $this->courseRepository->findBySlugOrFail($slug);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        // check if the user is register to the course
        $courseRegistered = $this->courseRegistrationRepository->findOneWhere([
            'course_id' => $course->id,
            'user_id' => auth('user')->user()->id
        ], ['course_id', 'user_id']);

        if ($courseRegistered) {
            return redirect()->route('courses.show', $course->url_key);
        }

        $courseRegistration = CourseRegistration::registerStudent($course->id, auth('user')->user()->id);
        if ($courseRegistration) {
            session()->flash('success', 'You have successfully registered for this course!');
        }
        return back();
    }

    public function checkout($slug)
    {
        try {
            $course = $this->courseRepository->findBySlugOrFail($slug);
        } catch (ModelNotFoundException $exception) {
            abort(404);
        }
        request()->session()->put('payment', [
            'amount' => $course->price,
            'user_id' => auth('user')->user()->id,
            'item_no' => $course->id,
            'purpose' => 'Purchase of '.$course->name,
            'purchase_type' => 'course'
        ]);

        return view($this->_config['view'], compact('course'));
    }

}