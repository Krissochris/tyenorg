<?php


namespace GriffonTech\Shop\Http\Controllers;


use GriffonTech\Blog\Repositories\BlogRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    protected $blogRepository;

    public function __construct(
        BlogRepository $blogRepository
    )
    {
        $this->_config = request('_config');

        $this->blogRepository = $blogRepository;
    }

    public function index()
    {
        $blogs = $this->blogRepository->getModel()
            ->query()->paginate(10);

        return view($this->_config['view'], ['blogs' => $blogs]);
    }

    public function show($slug)
    {
        $blog = $this->blogRepository
            ->with(['user', 'comments'])
            ->findBySlugOrFail($slug);

        return view($this->_config['view'], compact('blog'));
    }

    public function addComment(Request $request, $slug)
    {
        $request->validate([
            'message' => 'required'
        ]);

        $newData = $request->only(['message']);
        $newData['comment'] = $newData['message'];
        unset($newData['message']);
        $newData['user_id'] = auth('user')->user()->id;

        $blog = $this->blogRepository
            ->findBySlugOrFail($slug);

        $new_comment = $blog->comments()->create($newData);
        if ($new_comment) {
            session()->flash('success', 'Your comment was successfully received');
        } else {
            session()->flash('error', 'We couldn\'t save your comment. Please try again');
        }

        return redirect()->route($this->_config['redirect'], $slug);
    }
}
