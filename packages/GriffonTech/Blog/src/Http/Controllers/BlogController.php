<?php

namespace GriffonTech\Blog\Http\Controllers;

use GriffonTech\Blog\Repositories\BlogCategoryRepository;
use GriffonTech\Blog\Repositories\BlogRepository;
use GriffonTech\Core\Helpers\FileManager;
use GriffonTech\User\Repositories\UserRepository;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    protected $_config;

    protected $blogRepository;

    protected $userRepository;

    protected $blogCategoryRepository;


    public function __construct(
        BlogRepository $blogRepository,
        UserRepository $userRepository,
        BlogCategoryRepository $blogCategoryRepository
    )
    {

        $this->_config = request('_config');

        $this->blogRepository = $blogRepository;

        $this->userRepository = $userRepository;

        $this->blogCategoryRepository = $blogCategoryRepository;
    }


    public function index()
    {
        $blogs = $this->blogRepository
            ->with(['user:id,name', 'comments:id,blog_id'])
            ->paginate(15);
        return view($this->_config['view'])->with(compact('blogs'));
    }


    public function create()
    {
        $users = $this->userRepository
            ->pluck('name', 'id')
            ->prepend('-- Select User --', '')
            ->toArray();

        $blog_categories = $this->blogCategoryRepository->pluck('name', 'id');

        return view($this->_config['view'],
            compact('users', 'blog_categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'user_id' => 'required',
            'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:1048'
        ]);

        $blogData = $request->input();
        if ($request->file('photo')) {
            $image = $request->file('photo');

            if ($updated = (new FileManager())->upload($image, 'blogs')) {
                $blogData['photo'] = $updated;
            } else {
                session()->flash('error', 'Photo could not be uploaded.');
            }
        }
        $blog = $this->blogRepository->create($blogData);

        if ($blog) {
            session()->flash('success', 'Blog post was successfully created');
        } else {
            session()->flash('error', 'Blog post was not successfully created. Please try again later.');
        }
        return redirect()->route($this->_config['redirect']);
    }



    public function edit($id)
    {
        $blog = $this->blogRepository
            ->with([
                'user:id,name',
                'comments.user'
            ])
            ->findOrFail($id);

        $users = $this->userRepository->pluck('name', 'id')->toArray();
        $blog_categories = $this->blogCategoryRepository->pluck('name', 'id');

        return view($this->_config['view'],
            compact('blog', 'users', 'blog_categories'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'user_id' => 'required'
        ]);

        $blog = $this->blogRepository->find($id);

        if ($request->file('photo')) {
            $image = $request->file('photo');
            if ($updated = (new FileManager())->update($image, $blog->photo, 'blogs')) {
                $blog->forceFill(['photo' => $updated]);
            } else {
                session()->flash('error', 'Photo could not be updated.');
            }
        }

        $blog = $this->blogRepository->update($request->input(), $id);
        if ($blog) {
            session()->flash('success', 'Blog post was successfully updated!');
        } else {
            session()->flash('error', 'Blog post was not successfully updated!');
        }
        return back();
    }



    public function show($id)
    {
        $blog = $this->blogRepository->findOrFail($id);

        return view($this->_config['view'], compact('blog'));
    }


    public function destroy($id)
    {
        $blogDeleted = $this->blogRepository->delete($id);

        if ($blogDeleted) {
            session()->flash('success', 'Blog post was successfully deleted!');
        } else {
            session()->flash('error', 'Blog post could not be deleted!. Please try again later.');
        }
        return redirect()->route('admin.blogs.index');
    }
}
