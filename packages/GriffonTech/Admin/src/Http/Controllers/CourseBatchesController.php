<?php


namespace GriffonTech\Admin\Http\Controllers;


use GriffonTech\Course\Repositories\CourseBatchRepository;
use GriffonTech\Course\Repositories\CourseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseBatchesController extends Controller
{

    protected $_config;

    protected $courseBatchRepository;
    protected $courseRepository;

    public function __construct(
        CourseBatchRepository $courseBatchRepository,
        CourseRepository $courseRepository
    )
    {
        $this->_config = request('_config');

        $this->courseBatchRepository = $courseBatchRepository;
        $this->courseRepository = $courseRepository;
    }

    public function index()
    {
        $course_batches = $this->courseBatchRepository
            ->get();

        return view($this->_config['view'])
            ->with(compact('course_batches'));
    }


    public function create()
    {
        $courses = $this->courseRepository
            ->findWhere(['status' => 1])
            ->pluck('name', 'id');

        return view($this->_config['view'])
            ->with(compact('courses'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'number_of_batches' => 'required'
        ]);

        $course = $this->courseRepository
            ->find($request->input('course_id'));

        if (!$course) {
            session()->flash('error', 'The system could\'nt find the selected course');
            return redirect()->route($this->_config['redirect']);
        }
        $newData = [
            'course_id' => $course->id,
            'tutor_id' => $course->tutor_id,
            'maximum_number_of_users' => $course->total_no_of_users_in_batch,
        ];
        $created = false;
        for ($num = 0; $num < $request->input('number_of_batches'); $num++) {
            $course_batch = $this->courseBatchRepository->create($newData);
            if ($course_batch) {
                $created = true;
            }
        }
        if ($created) {
            session()->flash('success', 'Course Batch(s) were successfully created!');
        } else {
            session()->flash('error', 'Course batch(s) could not be created.Please try again.');
        }
        return redirect()->route($this->_config['redirect']);
    }



    public function show($id)
    {
        $course_batch = $this->courseBatchRepository
            ->with(['course_registrations'])
            ->find($id);

        return view($this->_config['view'])
            ->with(compact('course_batch'));
    }


    public function edit($id)
    {
        $course_batch = $this->courseBatchRepository
            ->with(['course', 'tutor'])
            ->findOrFail($id);

        return view($this->_config['view'])
            ->with(compact('course_batch'));

    }

    public function update(Request $request, $id)
    {
        $postData = $request->all();
        if ($postData['is_taken']) {
            $postData['time_completed'] = now();
        }

        $course_batch = $this->courseBatchRepository->update($postData, $id);
        if ($course_batch) {
            session()->flash('success', 'Course was successfully updated');
        } else {
            session()->flash('error', 'Course Batch could not be updated. Please try again later');
        }

        return redirect()->route($this->_config['redirect']);
    }

    public function destroy($id)
    {
        $course_batch = $this->courseBatchRepository
            ->findOrFail($id);

        if ($course_batch->no_of_users || $course_batch->is_taken) {
            session()->flash('error', 'You can\'t delete this batch because some students has registered for it');

            return redirect()->route($this->_config['redirect']);
        }

        if ($this->courseBatchRepository->delete($id)) {
            session()->flash('success', 'Course batch was successfully deleted.');
        }
        return redirect()->route($this->_config['redirect']);
    }

    public function payTutor($id)
    {
        $course_batch = $this->courseBatchRepository
            ->findOrFail($id);

        return view($this->_config['view'])
            ->with(compact('course_batch'));
    }

    public function processPayTutor(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required'
        ]);

        $course_batch = $this->courseBatchRepository->findOrFail($id);
        try {
            DB::beginTransaction();
            $course_batch->markCompleted();
            if ($course_batch->tutor->credit($request->input('amount'))) {
                $course_batch->markPaidTutorAsCompleted();
                session()->flash('success', 'Tutor was successfully paid');
            } else {
                throw new \Exception('Could not pay the tutor');
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            session()->flash('error', 'An Error occurred trying to pay the tutor.Please try again');
        }
        // get the user profile
        // mark the batch as completed
        // mark the
        return redirect()->route($this->_config['redirect']);
    }

}
