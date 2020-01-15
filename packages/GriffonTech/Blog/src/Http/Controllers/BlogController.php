<?php

namespace GriffonTech\Blog\Http\Controllers;

use GriffonTech\Blog\Repositories\BlogRepository;
use GriffonTech\User\Repositories\UserRepository;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    protected $_config;

    protected $blogRepository;

    protected $userRepository;


    public function __construct(
        BlogRepository $blogRepository,
        UserRepository $userRepository
    )
    {

        $this->_config = request('_config');

        $this->blogRepository = $blogRepository;

        $this->userRepository = $userRepository;
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

        return view($this->_config['view'], compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'user_id' => 'required'
        ]);

        $blog = $this->blogRepository->create($request->input());

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

        return view($this->_config['view'], compact('blog', 'users'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'user_id' => 'required'
        ]);

        $blog = $this->blogRepository->update($request->input(), $id);

        if ($blog) {
            session()->flash('success', 'Blog post was successfully updated!');
        } else {
            session()->flash('error', 'Blog post was not successfully updated!');
        }
        return redirect()->route($this->_config['redirect'], $id);
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