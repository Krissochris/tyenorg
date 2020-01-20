<?php


namespace GriffonTech\User\Http\Controllers;


use GriffonTech\Blog\Repositories\BlogRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use GriffonTech\Core\Helpers\FileManager;

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
            'title' => 'required|string',
            'body' => 'required|string',
            'photo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:1048',
        ]);

        $data = $request->input();

        $data['user_id'] = auth('user')->user()->id;

        $image = $request->file('photo');

        if ($image) {

            if ($fileUploaded = (new FileManager())->upload($image, 'blogs')) {

                $data['photo'] = $fileUploaded;

            } else {
                session()->flash('error', 'Photo could not be uploaded');
            }
        }
        $blog = $this->blogRepository->create($data);

        if ($blog) {
            session()->flash('success', 'Blog post was successfully created');
        } else {
            session()->flash('error', 'Blog post could not be created');
        }
        return redirect()->route($this->_config['redirect']);
    }

    public function edit($slug)
    {
        try {
            $blog = $this->blogRepository->findBySlugOrFail($slug);
        } catch (ModelNotFoundException $modelNotFoundException) {
            // handle error
        }

        return view($this->_config['view'])->with(compact( 'blog'));
    }

}
