<?php

namespace GriffonTech\Tutor\Http\Controllers;
use GriffonTech\Course\Repositories\CourseCategoryRepository;
use GriffonTech\Course\Repositories\CourseRepository;
use GriffonTech\Course\Repositories\CourseBatchRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use GriffonTech\Core\Helpers\FileManager;

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
        $courses = $this->courseRepository
            ->findTutorCourses(auth('user')->user()->tutor_id);
        return view($this->_config['view'])->with(compact('courses'));
    }


    public function create()
    {
        $courseTypes = CourseRepository::TYPE;
        $categories = $this->courseCategoryRepository
            ->getList()
            ->prepend('--Select Category--' ,'');

        return view($this->_config['view'])
            ->with(compact(
                'categories',
                'courseTypes'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'course_category_id' => 'required',
            'summary' => 'required',
            'type' => 'required',
            'description' => 'required',
            'learning_url' => 'required|max:150',
            'total_no_of_users_in_batch' => 'required',
            'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = $request->except(['status', 'approved_on', 'active']);

        $data['tutor_id'] = auth('user')->user()->tutor_id;

        $data['number_of_batches'] = $request->input('number_of_batch');
        // process the image

        $image = $request->file('photo');
        if ($image) {

            if ($fileUploaded = (new FileManager())->upload($image, 'courses')) {

                $data['photo'] = $fileUploaded;

            } else {
                session()->flash('error', 'Photo could not be uploaded');
            }
        }

        $course = $this->courseRepository->create($data);

        if ($course) {
            /*if ((int)$request->input('number_of_batch') > 0) {
                $this->courseBatchRepository->createBatches($request->input('number_of_batch'), $course);
            }*/
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
        $courseTypes = CourseRepository::TYPE;
        $courseStatus = CourseRepository::STATUS;
        $categories = $this->courseCategoryRepository->getList()->prepend('--Select Category--' ,'');
        return view($this->_config['view'])->with(compact(
            'categories', 'course', 'courseTypes', 'courseStatus'));
    }


    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'course_category_id' => 'required',
            'summary' => 'required',
            'description' => 'required',
            'photo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        try {
            $course = $this->courseRepository->findBySlugOrFail($slug);

        } catch (ModelNotFoundException $modelNotFoundException) {

            session()->flash('error', 'Course does not exist!');
            return redirect()->route($this->_config['redirect']);
        }

        $courseUpdate = $request->except(['status', 'approved_on', 'active', 'photo']);

        if ($request->file('photo')) {
            $image = $request->file('photo');

            if ($updated = (new FileManager())->update($image, $course->photo, 'courses')) {

                $course->forceFill(['photo' => $updated]);
            } else {
                session()->flash('error', 'Photo could not be updated.');
            }

            /*$input = null;
            $input['photo_name'] = time().'.'.$image->getClientOriginalExtension();
            $input['photo_url_part'] = 'storage/images/courses';
            try {
                $input['photo_url'] = asset($input['photo_url_part']) .'/'. $input['photo_name'];
                $image->storeAs('public/images/courses/', $input['photo_name']);
                if ($course->photo) {
                    Storage::delete($course->photo);
                }

                $course->forceFill(['photo' => $input['photo_url']]);
            } catch ( \Exception $exception) {

               session()->flash('error', $exception->getMessage());
            }*/
        }
        $course =  $course->update($courseUpdate);

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
