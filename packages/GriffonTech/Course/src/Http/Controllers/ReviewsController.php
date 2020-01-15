<?php

namespace GriffonTech\Course\Http\Controllers;

use GriffonTech\Course\Repositories\CourseBatchRepository;
use GriffonTech\Course\Repositories\CourseRepository;
use GriffonTech\Course\Repositories\CourseReviewRepository;
use GriffonTech\User\Repositories\UserRepository;
use Illuminate\Http\Request;

class ReviewsController extends Controller {

    protected $_config;

    protected $courseReviewRepository;

    protected $courseRepository;

    protected $userRepository;

    protected $courseBatchRepository;

    public function __construct(
        CourseReviewRepository $courseReviewRepository,
        CourseRepository $courseRepository,
        UserRepository $userRepository,
        CourseBatchRepository $courseBatchRepository
    )
    {

        $this->_config = request('_config');

        $this->courseReviewRepository = $courseReviewRepository;

        $this->courseRepository = $courseRepository;

        $this->userRepository = $userRepository;

        $this->courseBatchRepository = $courseBatchRepository;

    }

    public function index()
    {
        $reviews = $this->courseReviewRepository
            ->with(['user:id,name', 'course:id,name', 'course_batch:id'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view($this->_config['view'])->with(compact('reviews'));
    }

    public function create()
    {
        $users = $this->userRepository->pluck('name', 'id')->prepend('--Select User--');

        $courses = $this->courseRepository->pluck('name', 'id')->prepend('--Select Course--');

        return view($this->_config['view'], compact('users', 'courses'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'course_id' => 'required',
            'course_batch_id' => 'required',
            'review' => 'required',
            'rating' => 'required',
        ]);

        $review = $this->courseReviewRepository->create($request->input());

        if ($review) {
            session()->flash('success', 'Review was successfully added!');
        } else {
            session()->flash('error', 'Review could not be added. Please try again later');
        }
        return redirect()->route($this->_config['redirect']);
        // validate and store the values
    }


    public function edit($id)
    {
        $review = $this->courseReviewRepository
            ->with(['user:id,name', 'course:id,name', 'course_batch:id'])
            ->findOrFail($id);

        return view($this->_config['view'])
            ->with(compact('review'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required',
            'review' => 'required'
        ]);

        $review = $this->courseReviewRepository->update($request->input(), $id);

        if ($review) {
            session()->flash('success', 'Review was successfully updated!');
        } else {
            session()->flash('error', 'Review could not be updated. Try again.');
        }
        return redirect()->route($this->_config['redirect'], $id);
    }

    public function getCourseBatches($id)
    {
        $course_batches = $this->courseBatchRepository
            ->findByField('course_id', $id)
            ->pluck('id');

        return view($this->_config['view'], compact('course_batches'));
    }
}