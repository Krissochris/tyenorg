<?php

namespace GriffonTech\Tutor\Http\Controllers;
use GriffonTech\Course\Repositories\CourseCategoryRepository;
use GriffonTech\Course\Repositories\CourseRepository;
use GriffonTech\Course\Repositories\CourseBatchRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;


/**
 * Course Controller
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
     * CourseRepository object
     *
     * @var Object
     */
    protected $courseRepository;

    /**
     * CourseCategoryRepository object
     *
     * @var Object
     */
    protected $courseCategoryRepository;

    /**
     * CourseBatchRepository object
     *
     * @var Object
     */
    protected $courseBatchRepository;


    public function __construct(
        CourseRepository $courseRepository,
        CourseCategoryRepository $courseCategoryRepository,
        CourseBatchRepository $courseBatchRepository
    )
    {

        $this->_config = request('_config');

        $this->courseRepository = $courseRepository;

        $this->courseCategoryRepository = $courseCategoryRepository;

        $this->courseBatchRepository = $courseBatchRepository;
    }

    public function index()
    {
        $courses = $this->courseRepository->findTutorCourses(auth('user')->user()->id);
        return view($this->_config['view'])->with(compact('courses'));
    }


    public function create()
    {
        $categories = $this->courseCategoryRepository->getList()->prepend('--Select Category--' ,'');
        return view($this->_config['view'])->with(compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'course_category_id' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'price' => 'required',
            'total_no_of_users_in_batch' => 'required',
            'total_no_of_referrals_needed' => 'required',
        ]);

        $data = $request->input();


        $data['tutor_id'] = auth('user')->user()->id;


        $course = $this->courseRepository->create($data);

        if ($course) {
            if ((int)$request->input('number_of_batch') > 0) {
                $this->courseBatchRepository->createBatches($request->input('number_of_batch'), $course);
            }
            session()->flash('success', 'Your course was successfully created');
        } else {
            session()->flash('error', 'Course could not be created. Please try again');
        }

        return redirect()->route($this->_config['redirect']);
    }




    public function show($slug)
    {
        $course = $this->courseRepository->findBySlugOrFail($slug);

        return view($this->_config['view'])->with(compact('course'));
    }

    public function edit($slug)
    {
        try {
            $course = $this->courseRepository->findBySlugOrFail($slug);
        } catch (ModelNotFoundException $modelNotFoundException) {
            // handle error
        }
        $categories = $this->courseCategoryRepository->getList()->prepend('--Select Category--' ,'');
        return view($this->_config['view'])->with(compact('categories', 'course'));
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required',
            'course_category_id' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'price' => 'required',
            'total_no_of_referrals_needed' => 'required',
        ]);

        try {
            $course = $this->courseRepository->findBySlugOrFail($slug);

        } catch (ModelNotFoundException $modelNotFoundException) {

            session()->flash('error', 'Course does not exist!');
            return redirect()->route($this->_config['redirect']);
        }
        $course =  $course->update($request->input());

        if ($course) {
            session()->flash('success', 'Course was successfully updated!');
        } else {
            session()->flash('error', 'Course could not be successfully updated!');
        }
        return redirect()->route($this->_config['redirect']);
    }


    /**
     *
     */
    public function destroy()
    {

    }

    public function review()
    {

    }

    public function course_batch()
    {

    }

}