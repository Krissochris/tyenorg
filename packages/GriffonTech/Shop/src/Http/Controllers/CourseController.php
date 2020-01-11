<?php

namespace GriffonTech\Shop\Http\Controllers;

use GriffonTech\Course\Repositories\CourseBatchRepository;
use GriffonTech\Course\Repositories\CourseCategoryRepository;
use GriffonTech\Course\Repositories\CourseRegistrationRepository;
use GriffonTech\Course\Repositories\CourseRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
            // redirect with an error message
        }

        // check if the user is register to the course
        $courseRegistered = $this->courseRegistrationRepository->findOneWhere([
            'course_id' => $course->id,
            'user_id' => auth('user')->user()->id
        ], ['course_id', 'user_id']);

        if ($courseRegistered) {
            return redirect()->route('courses.show', $course->url_key);
        }
        // add the user to the course
        // check if
        if (isset($course)) {
            // check if the course has a batch
            $course_batch = $course->course_batches()
                ->where('entry_status', 1)
                ->first();
            $course_batch->no_of_users += 1;
            if ($course_batch->no_of_users == $course_batch->maximum_number_of_users) {
                $course_batch->_entry_status = 0;
            }
            $course_batch->update();

            if ($course_batch) {

                $courseRegistration = $this->courseRegistrationRepository->create([
                    'user_id' => auth('user')->user()->id,
                    'course_id' => $course->id,
                    'batch_id' => $course_batch->id
                ]);

                if ($courseRegistration) {
                    session()->flash('success', 'You have successfully registered for this course!');
                }
            }
        }
        return back();
    }


}