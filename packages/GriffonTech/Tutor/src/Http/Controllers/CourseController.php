<?php

namespace GriffonTech\Tutor\Http\Controllers;
use GriffonTech\Course\Repositories\CourseCategoryRepository;
use GriffonTech\Course\Repositories\CourseRepository;
use GriffonTech\Course\Repositories\CourseBatchRepository;
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
        return view($this->_config['view']);
    }


    public function create()
    {
        $courseCategoriesList = $this->courseCategoryRepository->getList();
        return view($this->_config['view'])->with(compact('courseCategoriesList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'tutor_no_users_in_batch' => 'required',
            'total_no_referrals_needed' => 'required',
        ]);

        $data = $request->input();

        $data['tutor_id'] = auth('user')->user()->id;

        $course = $this->courseRepository->create($data);

        if ($course) {
            if ($request->input('number_of_batch') > 0) {
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

    public function edit()
    {

        return view($this->_config['view']);
    }

    public function update()
    {

    }

    public function destroy()
    {

    }

}