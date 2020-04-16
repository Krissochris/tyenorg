<?php
namespace GriffonTech\Shop\Http\Controllers;

use GriffonTech\Blog\Repositories\BlogRepository;
use GriffonTech\Course\Repositories\CourseRepository;
use GriffonTech\Testimony\Repositories\TestimonyRepository;
use GriffonTech\User\Repositories\UserRepository;

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

    protected $userRepository;
    /**
     * Create a new controller instance.
     * @param $testimonyRepository
     * @param $courseRepository
     * @param $blogRepository
     * @param $userRepository
     * @return void
     */
    public function __construct(
        TestimonyRepository $testimonyRepository,
        CourseRepository $courseRepository,
        BlogRepository $blogRepository,
        UserRepository $userRepository
    )
    {
        $this->_config = request('_config');

        $this->testimonyRepository = $testimonyRepository;
        $this->courseRepository = $courseRepository;
        $this->blogRepository = $blogRepository;
        $this->userRepository = $userRepository;
    }


    public function index()
    {
        $courses = $this->courseRepository
            ->getModel()
            ->latest()
            ->where('status', 1)
            ->limit(3)
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
            ->limit(3)->get();

        $blogPosts = $this->blogRepository->getModel()
            ->latest()
            ->limit(3)
            ->get();

        $userCounts = $this->userRepository->count();

        return view($this->_config['view'])
            ->with(compact('testimonies',
                'courses',
                'blogPosts',
                'userCounts'));
    }
}
