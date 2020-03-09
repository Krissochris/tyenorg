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
        dd($data);
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
            abort(404);
        }

        return view($this->_config['view'])->with(compact( 'blog'));
    }

    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'body' => 'required|string',
            'photo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:1048',
        ]);

        try {
            $blog = $this->blogRepository->findBySlugOrFail($slug);
        } catch (ModelNotFoundException $modelNotFoundException) {
            abort(404);
        }
        if (!$blog->user_id == auth('user')->user()->id){
            return back();
        }
        $image = $request->file('photo');
        $blog->fill($request->input());
        if ($image) {
            if ($fileUploaded = (new FileManager())->update($image, $blog->photo, 'blogs')) {
                $blog->fill(['photo'=> $fileUploaded]);
            } else {
                session()->flash('error', 'Photo could not be uploaded');
            }
        }
        $blogUpdated = $blog->update();
        if ($blogUpdated) {
            session()->flash('success', 'Blog post was successfully updated');
        } else {
        session()->flash('error', 'Blog post could not be updated');
        }

        return redirect()->route($this->_config['redirect']);
    }


    public function destroy($slug)
    {
        try {
            $blog = $this->blogRepository->findBySlugOrFail($slug);
        } catch (ModelNotFoundException $modelNotFoundException) {
            abort(404);
        }
        if (!$blog->user_id == auth('user')->user()->id){
            return back();
        }

        // delete the blog feature image
        (new FileManager())->delete($blog->photo, 'blogs');
        $blogDeleted = $blog->delete();

        if ($blogDeleted) {
            session()->flash('success', 'Blog post was successfully updated');
        } else {
            session()->flash('error', 'Blog post could not be updated');
        }

        return redirect()->route($this->_config['redirect']);
    }
}
