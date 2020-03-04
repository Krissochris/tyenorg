<?php
namespace GriffonTech\Shop\Http\Controllers;

use GriffonTech\Blog\Repositories\BlogRepository;
use GriffonTech\Course\Repositories\CourseRepository;
use GriffonTech\Testimony\Repositories\TestimonyRepository;

class HomeController extends Controller {

    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    protected $testimonyRepository;

    protected $courseRepository;

    protected $blogRepository;
    /**
     * Create a new controller instance.
     * @param $testimonyRepository
     * @param $courseRepository
     * @param $blogRepository
     * @return void
     */
    public function __construct(
        TestimonyRepository $testimonyRepository,
        CourseRepository $courseRepository,
        BlogRepository $blogRepository
    )
    {
        $this->_config = request('_config');

        $this->testimonyRepository = $testimonyRepository;
        $this->courseRepository = $courseRepository;
        $this->blogRepository = $blogRepository;
    }


    public function index()
    {
        $courses = $this->courseRepository
            ->getModel()
            ->latest()
            ->limit(4)
            ->get()
            ->map(function($row){
                $row->course_average_rating =
                    $row->course_reviews->average('rating');
                $row->total_reviews = $row->course_reviews->count();
                return $row;
            });

        $testimonies = $this->testimonyRepository
            ->getModel()
            ->with(['user:id,name'])
            ->latest()
            ->limit(4)->get();

        $blogPosts = $this->blogRepository->getModel()
            ->latest()
            ->limit(4)
            ->get();

        return view($this->_config['view'])
            ->with(compact('testimonies', 'courses', 'blogPosts'));
    }
}
