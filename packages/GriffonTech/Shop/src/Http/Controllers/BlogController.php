<?php


namespace GriffonTech\Shop\Http\Controllers;


use GriffonTech\Blog\Repositories\BlogRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        try {
            $blog = $this->blogRepository->findBySlugOrFail($slug);

        } catch (ModelNotFoundException $exception) {
            abort(404);
        }
        return view($this->_config['view'], compact('blog'));
    }
}
