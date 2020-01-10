<?php

namespace GriffonTech\Tutor\Http\Controllers;
use GriffonTech\Tutor\Repositories\TutorProfileRepository;

/**
 * Tutor controller for the tutor basically for the tasks of users which will be
 * done after customer authentication.
 *
 * @author    Johnbosco Omebe <johnboscoomebe@thegriffontechnology.com>
 * @copyright 2020 Griffon Technologies Nig (http://www.thegriffontechnologies.com)
 */
class TutorController extends Controller
{

    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * CustomerRepository object
     *
     * @var Object
     */
    protected $tutorProfileRepository;

    public function __construct(TutorProfileRepository $tutorProfileRepository)
    {
        $this->_config = request('_config');

        $this->$tutorProfileRepository = $tutorProfileRepository;
    }


    public function show()
    {
        return view($this->_config['view']);
    }

    public function update()
    {

    }
    
}