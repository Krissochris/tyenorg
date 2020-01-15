<?php


namespace GriffonTech\Admin\Http\Controllers;


use GriffonTech\Course\Repositories\CourseCategoryRepository;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    protected $_config;

    protected $courseCategoryRepository;



    public function __construct(
        CourseCategoryRepository $courseCategoryRepository
    )
    {
        $this->_config = request('_config');

        $this->courseCategoryRepository = $courseCategoryRepository;
    }



    public function index()
    {
        $categories = $this->courseCategoryRepository->paginate(15);

        return view($this->_config['view'], compact('categories'));
    }



    public function create()
    {
        return view($this->_config['view']);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:course_categories',
        ]);

        $category = $this->courseCategoryRepository->create($request->input());

        if ($category) {
            session()->flash('success', 'Category was successfully created!');
        } else {
            session()->flash('error', 'Category could not be created. Please try again.');
        }
        return redirect()->route($this->_config['redirect']);
    }



    public function show($id)
    {
        $category = $this->courseCategoryRepository->findOrFail($id);
        return view($this->_config['view'], compact('category'));
    }



    public function edit($id)
    {
        $category = $this->courseCategoryRepository->findOrFail($id);
        return view($this->_config['view'], compact('category'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $category = $this->courseCategoryRepository->findOrFail($id);

        $categoryUpdated = $category->update($request->input());

        if ($categoryUpdated) {
            session()->flash('success', 'Category was successfully updated!');
        } else {
            session()->flash('error', 'Category could not be updated. Please try again.');
        }
        return redirect()->route($this->_config['redirect'], $id);
    }



    public function destroy($id)
    {
        $categoryDeleted = $this->courseCategoryRepository->delete($id);
        if ($categoryDeleted) {
            session()->flash('success', 'Category was successfully deleted!');
        } else {
            session()->flash('error', 'Category could not be deleted. Please try again later.');
        }
        return redirect()->route($this->_config['redirect']);
    }
}
