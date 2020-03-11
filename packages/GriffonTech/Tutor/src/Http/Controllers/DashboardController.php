<?php
namespace GriffonTech\Tutor\Http\Controllers;
use GriffonTech\Course\Repositories\CourseRepository;
use GriffonTech\Course\Repositories\CourseReviewRepository;
use GriffonTech\Tutor\Repositories\TutorProfileRepository;
use GriffonTech\Tutor\Repositories\TutorWalletRepository;

/**
 * Dashboard controller for the tutor basically for the tasks of users which will be
 * done after customer authentication.
 *
 * @author    Johnbosco Omebe <johnboscoomebe@thegriffontechnology.com>
 * @copyright 2020 Griffon Technologies Nig (http://www.thegriffontechnologies.com)
 */
class DashboardController extends Controller {

    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * courseRepository object
     *
     * @var Object
     */
    protected $courseRepository;

    /**
     * courseReviewRepository object
     *
     * @var Object
     */
    protected $courseReviewRepository;

    protected $tutorProfileRepository;


    public function __construct(
        CourseRepository $courseRepository,
        CourseReviewRepository $courseReviewRepository,
        TutorProfileRepository $tutorProfileRepository
    )
    {
        $this->_config = request('_config');

        $this->courseRepository = $courseRepository;

        $this->tutorProfileRepository = $tutorProfileRepository;

        $this->courseReviewRepository = $courseReviewRepository;
    }


    public function index()
    {

        // count tutor courses
        $tutorCourses = $this->courseRepository->findTutorCourses(auth('user')->user()->id, ['id']);

        $totalCourses = $tutorCourses->count();

        $courses_ids = $tutorCourses->pluck('id');

        $tutorProfile = $this->tutorProfileRepository->find(auth('user')->user()->tutor_id);

        $totalReviews = $this->courseReviewRepository->findCoursesReviews($courses_ids)->count();
        // get the tutor amount in the wallet
        // get the tutor total reviews count
        return view($this->_config['view'])->with(compact('totalCourses', 'totalReviews', 'tutorProfile'));
    }
}
