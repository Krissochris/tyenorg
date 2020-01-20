<?php


namespace GriffonTech\User\Http\Controllers;


use GriffonTech\Course\Repositories\CourseReviewRepository;
use Illuminate\Http\Request;

class CourseReviewController extends Controller
{

    protected $_config;


    protected $courseReviewRepository;

    public function __construct(
        CourseReviewRepository $courseReviewRepository
    )
    {

        $this->_config = request('_config');

        $this->courseReviewRepository = $courseReviewRepository;
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'review' => 'required|string',
            'rating' => 'required|integer',
            'course_id' => 'required|integer',
            'course_batch_id' => 'required|integer',
        ]);

        $data = $request->input();

        $data['user_id'] = auth('user')->user()->id;

        $review = $this->courseReviewRepository->create($data);

        if ($review) {
            session()->flash('success', 'Course review was successfully added');
        } else {
            session()->flash('error', 'Course review could not be added. Please try again');
        }

        return back();
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'review' => 'required|string',
            'rating' => 'required|integer',
        ]);

        $course_review = $this->courseReviewRepository->findOrFail($id, ['user_id', 'id']);

        if (!$course_review->user_id == auth('user')->user()->id) {
            return back();
        }
        $courseReviewUpdated = $this->courseReviewRepository->update($request->only([
            'review', 'rating'
        ]), $id);
        if ($courseReviewUpdated) {
            session()->flash('success', 'Course review was successfully updated');
        } else {
            session()->flash('error', 'Course review could not be updated. Please try again');
        }

        return back();

    }


    public function destroy($id)
    {
        $course_review = $this->courseReviewRepository
            ->findOrFail($id);
        if (!$course_review->user_id == auth('user')->user()->id) {
            return back();
        }
        if ($course_review->delete()) {
            session()->flash('success', 'Course review was successfully deleted');
        } else {
            session()->flash('error', 'Course review could not be delete. Please try again');
        }
        return back();
    }
}