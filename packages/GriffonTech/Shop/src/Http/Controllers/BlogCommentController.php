<?php


namespace GriffonTech\Shop\Http\Controllers;


use GriffonTech\Blog\Repositories\BlogCommentRepository;
use GriffonTech\Blog\Repositories\BlogRepository;

class BlogCommentController extends Controller
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    protected $blogRepository;

    protected $blogCommentRepository;

    public function __construct(
        BlogRepository $blogRepository,
        BlogCommentRepository $blogCommentRepository
    )
    {
        $this->_config = request('_config');

        $this->blogRepository = $blogRepository;

        $this->blogCommentRepository = $blogCommentRepository;
    }

    public function destroy($id)
    {
        $comment = $this->blogCommentRepository
            ->find($id);

        if ($comment->user_id === auth('user')->user()->id) {
            if ($this->blogCommentRepository->delete($id)) {
               session()->flash('success', 'Your comment was successfully deleted');
            } else {
                session()->flash('error', 'Your comment could not be deleted');
            }
            return back();
        } else {
            abort(403);
        }
    }

}
