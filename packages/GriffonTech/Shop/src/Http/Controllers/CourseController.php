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
        $courses = $this->courseRepository->getAllCourses(6);

        return view($this->_config['view'])->with(compact('courses'));
    }





    public function show($slug)
    {
        try {
            $course = $this->courseRepository
                ->with(['tutor', 'course_reviews'])
                ->findBySlugOrFail($slug);

        } catch (ModelNotFoundException $exception) {
            abort(404);
        }

        if (isset(auth('user')->user()->id)) {
            $courseRegistered = $this->courseRegistrationRepository
                ->findWhere([
                    'user_id' => auth('user')->user()->id,
                    'course_id' => $course->id,
                ],['user_id', 'course_id'])->first();
            if ($courseRegistered) {
                $course->is_registered = true;
            } else {
                $course->is_registered = false;
            }
        }
        $relatedCourses = $this->courseRepository->findWhere([
            'course_category_id' => $course->course_category_id
        ]);

        return view($this->_config['view'])->with(compact('course', 'relatedCourses'));
    }

    public function join($slug)
    {
        $course = $this->courseRepository->findBySlugOrFail($slug);

        // check if the user is a pro user
        if ( in_array($course->type,[CourseRepository::PRO_USER_FREE, CourseRepository::PRO_MEMBER_PAID]) &&  !auth('user')->user()->isProUser()) {

            session()->flash('error','You have to be a pro member to join this course');
            return redirect()->route('user.pro_user');
        }

        // check if the user is register to the course
        $courseRegistered = $this->courseRegistrationRepository->findOneWhere([
            'course_id' => $course->id,
            'user_id' => auth('user')->user()->id
        ]);

        if ($courseRegistered) {
            session()->flash('info', 'You are already registered to this course');
            return back();
        }

        $courseRegistration = CourseRegistration::registerStudent($course->id, auth('user')->user()->id);

        if ($courseRegistration) {
            session()->flash('success', 'You have successfully registered for this course!');
        } else {
            session()->flash('error', 'An error occurred adding you to the course. Please try again later.');
        }
        return back();
    }

    public function checkout($slug)
    {
        $course = $this->courseRepository->findBySlugOrFail($slug);

        // check if the user is a pro user
        if ( in_array($course->type,[CourseRepository::PRO_USER_FREE, CourseRepository::PRO_MEMBER_PAID]) &&  !auth('user')->user()->isProUser()) {

            session()->flash('error','You have to be a pro member to join this course');
            return redirect()->route('user.pro_user');
        }

        request()->session()->put('payment', [
            'amount' => $course->price,
            'user_id' => auth('user')->user()->id,
            'item_no' => $course->id,
            'customer_name' => auth('user')->user()->name,
            'customer_email' => auth('user')->user()->email,
            'customer_phone_number' => auth('user')->user()->phone_number,
            'purpose' => 'Purchase of '.$course->name,
            'purchase_type' => 'course_purchase',
            'currency' => "USD"
        ]);

        return view($this->_config['view'], compact('course'));
    }

}
