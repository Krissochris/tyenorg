<?php


namespace GriffonTech\Admin\Http\Controllers;


use GriffonTech\Course\Repositories\CourseCommentRepository;
use Illuminate\Http\Request;

class CourseCommentsController extends Controller
{

    protected $_config;

    protected $courseCommentRepository;

    public function __construct(
        CourseCommentRepository $courseCommentRepository
    )
    {
        $this->courseCommentRepository = $courseCommentRepository;
    }

    public function store(Request $request)
    {
        $request->validate([
            'note' => 'required'
        ]);

        $course_comment = $this->courseCommentRepository
            ->create($request->input());

        if ($course_comment) {
            session()->flash('success', 'Course comment was successfully added!');
        } else {
            session()->flash('error', 'Course comment could not be added. Please try again.');
        }
        return back();
    }


    public function destroy($id)
    {
        $course_comment_deleted = $this->courseCommentRepository
            ->delete($id);
        if ($course_comment_deleted) {
            session()->flash('success', 'Course comment was successfully deleted!');
        } else {
            session()->flash('error', 'Course comment could not be deleted!');
        }
        return back();
    }

}
