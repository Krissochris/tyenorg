<?php


namespace GriffonTech\Admin\Http\Controllers;


use GriffonTech\Course\Repositories\CourseRepository;
use GriffonTech\Course\Repositories\CourseReviewRepository;
use GriffonTech\Tutor\Repositories\TutorProfileRepository;
use GriffonTech\User\Repositories\UserRepository;

class DashboardController extends Controller
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    protected $userRepository;

    protected $courseRepository;

    protected $tutorProfileRepository;

    protected $courseReviewRepository;


    //protected $
    /**
     * Create a new Repository instance.
     *
     * @return void
     */
    public function __construct(
        UserRepository $userRepository,
        CourseRepository $courseRepository,
        TutorProfileRepository $tutorProfileRepository,
        CourseReviewRepository $courseReviewRepository
    )
    {

        $this->_config = request('_config');

        $this->userRepository = $userRepository;

        $this->courseRepository = $courseRepository;

        $this->tutorProfileRepository = $tutorProfileRepository;

        $this->courseReviewRepository = $courseReviewRepository;
    }

    public function index()
    {

        $users_total = $this->userRepository->count();

        $courses_total = $this->courseRepository->count();

        $tutors_total = $this->tutorProfileRepository->count();

        $reviews_total = $this->courseReviewRepository->count();
        return view($this->_config['view'])->with(compact('users_total',
            'courses_total', 'tutors_total', 'reviews_total'));
    }
}
