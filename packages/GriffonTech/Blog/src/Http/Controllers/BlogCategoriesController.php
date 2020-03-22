<?php


namespace GriffonTech\Blog\Http\Controllers;


use GriffonTech\Blog\Repositories\BlogCategoryRepository;
use Illuminate\Http\Request;

class BlogCategoriesController extends Controller
{

    protected $_config;

    protected $blogCategoryRepository;


    public function __construct(
        BlogCategoryRepository $blogCategoryRepository
    )
    {
        $this->_config = request('_config');

        $this->blogCategoryRepository = $blogCategoryRepository;
    }

    public function index()
    {
        $blog_categories = $this->blogCategoryRepository->get();

        return view($this->_config['view'])
            ->with(compact('blog_categories'));
    }

    public function create()
    {
        return view($this->_config['view']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $blog_category = $this->blogCategoryRepository
            ->create($request->input());

        if ($blog_category) {
            session()->flash('success', 'New Blog Category was successfully created');
        } else {
            session()->flash('error', 'New Blog Category could not be added.');
        }
        return redirect()->route($this->_config['redirect']);
    }


    public function edit($id)
    {
        $blog_category = $this->blogCategoryRepository->find($id);

        return view($this->_config['view'])
            ->with(compact('blog_category'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $blog_category = $this->blogCategoryRepository->update($request->input(), $id);

        if ($blog_category) {
            session()->flash('success', 'Blog category was successfully updated');
        } else {
            session()->flash('error', 'Blog category could not be updated');
        }
        return redirect()->route($this->_config['redirect']);
    }



    public function destroy($id)
    {
        try {
            $blog_category = $this->blogCategoryRepository->delete($id);
            if ($blog_category) {
                session()->flash('success', 'Blog category was successfully deleted');
            } else {
                session()->flash('error', 'Blog category could not be deleted.');
            }
        } catch (\Exception $exception) {
            session()->flash('error', $exception->getMessage());
        }
        return redirect()->route($this->_config['redirect']);
    }


}
