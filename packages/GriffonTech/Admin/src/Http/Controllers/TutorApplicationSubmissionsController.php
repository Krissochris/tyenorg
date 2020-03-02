<?php


namespace GriffonTech\Admin\Http\Controllers;


use GriffonTech\Tutor\Repositories\TutorApplicationSubmissionRepository;
use GriffonTech\User\Repositories\UserRepository;
use Illuminate\Http\Request;

class TutorApplicationSubmissionsController extends Controller
{

    protected $_config;

    protected $tutorApplicationSubmissionRepository;
    protected $userRepository;

    public function __construct(
        TutorApplicationSubmissionRepository $tutorApplicationSubmissionRepository,
        UserRepository $userRepository
    )
    {
        $this->_config = request('_config');

        $this->tutorApplicationSubmissionRepository = $tutorApplicationSubmissionRepository;

        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $tutorApplicationSubmissions = $this->tutorApplicationSubmissionRepository
            ->with(['tutor_profile'])
            ->findWhere(['status' => TutorApplicationSubmissionRepository::ACTIVE]);

        return view($this->_config['view'])
            ->with(compact('tutorApplicationSubmissions'));
    }

    public function show($id)
    {
        $tutor_application = $this->tutorApplicationSubmissionRepository
            ->with(['tutor_profile.tutor_application_courses'])
            ->find($id);

        return view($this->_config['view'])
            ->with(compact('tutor_application'));
    }

    public function reject($id)
    {
        $tutor_application = $this->tutorApplicationSubmissionRepository
            ->with(['tutor_profile'])
            ->find($id);

        $tutor_application->forceFill(['status' => TutorApplicationSubmissionRepository::CANCELLED]);
        if ($tutor_application->update()) {
            session()->flash('success', 'Tutor application was successfully rejected');
        } else {
            session()->flash('error', 'Tutor application could not be rejected. Please try again.');
        }
        return redirect()->route($this->_config['redirect']);
    }

    public function approve($id)
    {
        $tutor_application = $this->tutorApplicationSubmissionRepository
            ->with(['tutor_profile'])
            ->find($id);

        $tutor_application->update([
            'status' => TutorApplicationSubmissionRepository::APPROVED
        ]);
        $user = $this->userRepository->find($tutor_application->tutor_profile->user_id);
        $user->forceFill(['tutor_id' => $tutor_application->tutor_profile->id]);

        if ($user->update()) {
            session()->flash('success', 'Tutor application was successfully approved');
        } else {
            session()->flash('error', 'Tutor application could not be approved. Please try again.');
        }
        return redirect()->route($this->_config['redirect']);
    }

}