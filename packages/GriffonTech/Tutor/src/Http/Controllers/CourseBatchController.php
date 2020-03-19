<?php

namespace GriffonTech\Tutor\Http\Controllers;

use GriffonTech\Course\Repositories\CourseBatchRepository;
use GriffonTech\Course\Repositories\CourseRegistrationRepository;
use GriffonTech\Course\Repositories\CourseRepository;
use Illuminate\Http\Request;

class CourseBatchController extends Controller
{

    protected $_config;

    protected $courseRepository;

    protected $courseBatchRepository;

    protected $courseRegistrationRepository;



    public function __construct(
        CourseBatchRepository $courseBatchRepository,
        CourseRepository $courseRepository,
        CourseRegistrationRepository $courseRegistrationRepository

        // confirm that the course_id belongs to the tutor before proceeding with the
        // action please .
    )
    {
        $this->_config = request('_config');

        $this->courseBatchRepository = $courseBatchRepository;

        $this->courseRepository = $courseRepository;

        $this->courseRegistrationRepository = $courseRegistrationRepository;
    }

    public function index($course_id)
    {
        $course = $this->courseRepository->with(['course_batches'])
            ->find($course_id, ['id','name']);

        return view($this->_config['view'])->with(compact('course'));
    }


    public function create($course_id)
    {

        $course = $this->courseRepository->find($course_id);
        return view($this->_config['view'], compact('course'));
    }



    public function store(Request $request, $course_id)
    {
        $course = $this->courseRepository->find($course_id);

        $coursesCreated = false;

        if ($request->input('number_of_batch')) {

            for($num = 0; $num < $request->input('number_of_batch'); $num++) {

                $this->courseBatchRepository->create([
                    'course_id' => $course->id,
                    'tutor_id' => auth('user')->user()->id,
                    'maximum_number_of_users' => $request->input('maximum_number_of_users')
                ]);

                $coursesCreated = true;
            }
        }

        if ($coursesCreated) {
            session()->flash('success', 'Course batch(s) was successfully created.');
        } else {
            session()->flash('error', 'Course batch(s) could not be created ');
        }

        return redirect()->route($this->_config['redirect'], $course->id);
    }


    public function edit($id)
    {
        $course_batch = $this->courseBatchRepository->findOrFail($id);

        if ($course_batch->tutor_id !== auth('user')->user()->tutor_id) {
            abort(403);
        }

        return view($this->_config['view'])->with(compact('course_batch'));
    }

    public function update(Request $request, $id)
    {
        $postData = $request->input();

        if ($request->input('is_taken')) {
            $postData['time_completed'] = now();
        }
        $courseBatchUpdated = $this->courseBatchRepository
            ->update($postData, $id);

        if ($courseBatchUpdated) {
            session()->flash('success', 'Course batch was successfully updated!');
        } else {
            session()->flash('error', 'Course batch could not be successfully updated.');
        }

        return redirect()->route($this->_config['redirect'], $id);
    }

    public function show($id)
    {
        $course_batch = $this->courseBatchRepository
            ->with(['course_registrations.user'])
            ->findOrFail($id);

        if ($course_batch->tutor_id !== auth('user')->user()->tutor_id) {
            abort(403);
        }

        return view($this->_config['view'])->with(compact('course_batch'));
    }

}
