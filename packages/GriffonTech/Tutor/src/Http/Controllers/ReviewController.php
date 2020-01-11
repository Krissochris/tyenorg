<?php

namespace GriffonTech\Tutor\Http\Controllers;
use GriffonTech\Course\Repositories\CourseRepository;
use GriffonTech\Course\Repositories\CourseReviewRepository;
use Illuminate\Http\Request;

/**
 * Tutor controller for the tutor basically for the tasks of users which will be
 * done after customer authentication.
 *
 * @author    Johnbosco Omebe <johnboscoomebe@thegriffontechnology.com>
 * @copyright 2020 Griffon Technologies Nig (http://www.thegriffontechnologies.com)
 */
class ReviewController extends Controller
{

    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * CourseRepository object
     *
     * @var Object
     */
    protected $courseRepository;

    /**
     * CourseReviewRepository object
     *
     * @var Object
     */
    protected $courseReviewRepository;


    public function __construct(
        CourseRepository $courseRepository,
        CourseReviewRepository $courseReviewRepository
    )
    {
        $this->middleware('user');

        $this->_config = request('_config');

        $this->courseRepository = $courseRepository;

        $this->courseReviewRepository = $courseReviewRepository;
    }


    public function index()
    {
        $courses_ids = $this->courseRepository->findTutorCourses(auth('user')->user()->id)
            ->pluck('id')->toArray();

        $reviews = $this->courseReviewRepository->findCoursesReviews($courses_ids);

        return view($this->_config['view'])->with(compact('reviews'));
    }

}