<?php

namespace GriffonTech\Course\Http\Controllers;

use GriffonTech\Course\Repositories\CourseCategoryRepository;
use GriffonTech\Course\Repositories\CourseRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Course Category controller
 *
 * @author    Johnbosco Omebe <johnboscoomebe@thegriffontechnology.com>
 * @copyright 2020 Griffon Technologies Nig (http://www.thegriffontechnologies.com)
 */
class CourseCategoryController extends Controller
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;



    /**
     * courseCategoryRepository object
     *
     * @var Object
     */
    protected $courseCategoryRepository;

    public function __construct(
        CourseCategoryRepository $courseCategoryRepository
    )
    {
        $this->_config = request('_config');


        $this->courseCategoryRepository = $courseCategoryRepository;
    }


    public function show($slug)
    {
        try {
            $courses = $this->courseCategoryRepository->findBySlugOrFail($slug);
        } catch (ModelNotFoundException $exception) {
            //handle the error
        }
        return view($this->_config['view'], compact( 'courses'));
    }



}