<?php


namespace GriffonTech\Admin\Http\Controllers;


use GriffonTech\Course\Repositories\CourseBatchRepository;
use GriffonTech\Course\Repositories\CourseCategoryRepository;
use GriffonTech\Course\Repositories\CourseRepository;
use GriffonTech\Tutor\Repositories\TutorProfileRepository;
use Illuminate\Http\Request;
use GriffonTech\Core\Helpers\FileManager;

class CoursesController extends Controller
{

    protected $_config;

    protected $courseRepository;

    protected $tutorProfileRepository;

    protected $courseCategoryRepository;

    protected $courseBatchRepository;


    public function __construct(
        CourseRepository $courseRepository,
        CourseCategoryRepository $courseCategoryRepository,
        TutorProfileRepository $tutorProfileRepository,
        CourseBatchRepository $courseBatchRepository
    )
    {

        $this->_config = request('_config');

        $this->courseRepository = $courseRepository;

        $this->tutorProfileRepository = $tutorProfileRepository;

        $this->courseCategoryRepository = $courseCategoryRepository;
    }



    public function index()
    {

        $courses = $this->courseRepository
            ->with(['tutor:id,name'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view($this->_config['view'], compact('courses'));

    }

    public function create()
    {
        $categories = $this->courseCategoryRepository->getList();

        $tutors = $this->tutorProfileRepository->getList();

        $courseTypes = CourseRepository::TYPE;

        return view($this->_config['view'])
            ->with(compact('categories', 'tutors', 'courseTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'summary' => 'required',
            'course_category_id' => 'required',
            'tutor_id' => 'required',
            'type' => 'required',
            'total_no_of_users_in_batch'
        ]);
        $data = $request->input();

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
            if ((int)$request->input('number_of_batch') > 0) {
                $this->courseBatchRepository->createBatches($request->input('number_of_batch'), $course);
            }
            session()->flash('success', 'Course was successfully created!');
        } else {
            session()->flash('error', 'Course could not be created.Please try again');
        }
        return redirect()->route($this->_config['redirect']);
    }


    public function show($id)
    {
        $course = $this->courseRepository->with(['course_category','tutor.tutor_profile'])->findOrFail($id);

        return view($this->_config['view'])->with(compact('course'));
    }


    public function edit($id)
    {
        $course = $this->courseRepository->findOrFail($id);

        $categories = $this->courseCategoryRepository->getList();

        $tutors = $this->tutorProfileRepository->getList();

        $courseTypes = CourseRepository::TYPE;

        return view($this->_config['view'])
            ->with(compact('categories', 'tutors', 'courseTypes', 'course'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'summary' => 'required',
            'course_category_id' => 'required',
            'tutor_id' => 'required',
            'type' => 'required',
            'total_no_of_users_in_batch' => 'required',
            'photo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:1048'
        ]);

        $course = $this->courseRepository->findOrFail($id);


        if ($request->file('photo')) {
            $image = $request->file('photo');

            if ($updated = (new FileManager())->update($image, $course->photo, 'courses')) {

                $course->forceFill(['photo' => $updated]);
            } else {
                session()->flash('error', 'Photo could not be updated.');
            }
        }

        $courseUpdated = $course->update($request->input());

        if ($courseUpdated) {
            session()->flash('success', 'course was successfully updated!');
        } else {
            session()->flash('error', 'Course could not be updated. Please try again.');
        }

        return redirect()->route($this->_config['redirect'], $id);
    }



    public function destroy()
    {
        return view($this->_config['view']);
    }
}
