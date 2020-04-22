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

        $this->courseBatchRepository = $courseBatchRepository;
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
            'total_no_of_users_in_batch',
            'photo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $data = $request->except(['photo']);
        $data['number_of_batches'] = $request->input('number_of_batches');

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
        $course = $this->courseRepository
            ->with([
                'course_category',
                'tutor',
                'course_batches',
                'course_registrations.user:id,name'
            ])
            ->findOrFail($id);

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
            'photo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $course = $this->courseRepository->findOrFail($id);

        $updateData = $request->except(['photo','_method']);

        if ($request->file('photo')) {
            $image = $request->file('photo');

            if ($updated = (new FileManager())->update($image, $course->photo, 'courses')) {
                $updateData['photo'] = $updated;

            } else {
                session()->flash('error', 'Photo could not be updated.');
            }
        }

        $courseUpdated = $this->courseRepository->update($updateData, $id);

        if ($courseUpdated) {
            session()->flash('success', 'course was successfully updated!');
        } else {
            session()->flash('error', 'Course could not be updated. Please try again.');
        }

        return redirect()->route($this->_config['redirect'], $id);
    }



    public function destroy($id)
    {
        // remove the course
        // remove the course batches
        // check if the course has any completed batches and stop
        $course_batches = $this->courseBatchRepository->findWhere([
            'course_id' => $id
        ]);

        if ($course_batches->count()) {
            $completed_first_batch = $course_batches->first(function($course_batch, $key) {
                return $course_batch->is_taken == 1;
            });
        }
        if (isset($completed_first_batch) && $completed_first_batch) {
            session()->flash('error', 'You can not delete a course with completed batch(s).');

            return redirect()->route($this->_config['redirect']);
        }

        if ($course_batches->count()) {
            $registered_batch = $course_batches->first(function($course_batch, $key) {
               return $course_batch->no_of_users > 0;
            });
        }
        if (isset($registered_batch) && $registered_batch) {
            session()->flash('error', 'You can\'t delete a course which students has registered to.');

            return redirect()->route($this->_config['redirect']);
        }

        if ($this->courseRepository->delete($id)) {
            foreach ($course_batches as $course_batch) {
                $course_batch->delete();
            }
            session()->flash('success', 'Course was successfully deleted!.');
        } else {
            session()->flash('error', 'Course could not be deleted.');
        }
        return redirect()->route($this->_config['redirect']);
    }

}
