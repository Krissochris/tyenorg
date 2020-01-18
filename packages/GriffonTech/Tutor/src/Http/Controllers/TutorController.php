<?php

namespace GriffonTech\Tutor\Http\Controllers;
use GriffonTech\Tutor\Repositories\TutorProfileRepository;
use Illuminate\Http\Request;

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
        $this->middleware('user');

        $this->_config = request('_config');

        $this->tutorProfileRepository = $tutorProfileRepository;
    }


    public function edit()
    {
        $tutor = $this->tutorProfileRepository->firstOrCreate(['user_id' => auth('user')->user()->id]);

        return view($this->_config['view'], compact('tutor'));
    }




    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'description' => 'required',
        ]);

        $data = $request->input();

        $tutorProfile = $this->tutorProfileRepository->findOneByField('user_id', auth('user')->user()->id);

        $tutorProfile = $tutorProfile->update($data);

        if ($tutorProfile) {
            session()->flash('success', 'Your profile was successfully updated!');
        } else {
            session()->flash('error', 'Your profile could not be updated. Please try again');
        }
        return redirect()->route($this->_config['redirect']);
    }

}
