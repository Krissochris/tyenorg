<?php


namespace GriffonTech\User\Http\Controllers;


use GriffonTech\Blog\Repositories\BlogRepository;
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
        $blogs = $this->blogRepository->findWhere([
            'user_id' => auth('user')->user()->id
        ]);

        return view($this->_config['view'], ['blogs' => $blogs]);
    }

    public function create()
    {
        return view($this->_config['view']);
    }


    public function store(Request $request)
    {
        $this->validate($request, [

        ]);

        $blog = $this->blogRepository->create($request->input());

        if ($blog) {
            session()->flash('success', 'Blog post was successfully created');
        } else {
            session()->flash('error', 'Blog post could not be created');
        }
        return redirect()->route($this->_config['redirect']);
    }

}
