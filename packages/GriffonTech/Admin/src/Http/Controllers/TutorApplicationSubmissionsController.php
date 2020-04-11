<?php


namespace GriffonTech\Admin\Http\Controllers;


use GriffonTech\Tutor\Repositories\TutorAgreementAttributeRepository;
use GriffonTech\Tutor\Repositories\TutorAgreementRepository;
use GriffonTech\Tutor\Repositories\TutorApplicationSubmissionRepository;
use GriffonTech\Tutor\Repositories\TutorProfileRepository;
use GriffonTech\User\Repositories\UserRepository;
use Illuminate\Http\Request;

class TutorApplicationSubmissionsController extends Controller
{

    protected $_config;

    protected $tutorApplicationSubmissionRepository;
    protected $userRepository;
    protected $tutorProfileRepository;
    protected $tutorAgreementRepository;
    protected $tutorAgreementAttributeRepository;


    public function __construct(
        TutorApplicationSubmissionRepository $tutorApplicationSubmissionRepository,
        UserRepository $userRepository,
        TutorProfileRepository $tutorProfileRepository,
        TutorAgreementRepository $tutorAgreementRepository,
        TutorAgreementAttributeRepository $tutorAgreementAttributeRepository
    )
    {
        $this->_config = request('_config');

        $this->tutorApplicationSubmissionRepository = $tutorApplicationSubmissionRepository;

        $this->userRepository = $userRepository;

        $this->tutorProfileRepository = $tutorProfileRepository;

        $this->tutorAgreementRepository = $tutorAgreementRepository;

        $this->tutorAgreementAttributeRepository = $tutorAgreementAttributeRepository;
    }

    public function index()
    {
        $tutorApplicationSubmissions = $this->tutorApplicationSubmissionRepository
            ->with(['tutor_application'])
            ->findWhere(['status' => TutorApplicationSubmissionRepository::ACTIVE]);

        return view($this->_config['view'])
            ->with(compact('tutorApplicationSubmissions'));
    }

    public function show($id)
    {
        $tutor_application = $this->tutorApplicationSubmissionRepository
            ->with(['tutor_application.tutor_application_courses'])
            ->find($id);

        $tutor_agreement = $this->tutorAgreementRepository
            ->findOneByField('tutor_application_id', $tutor_application->id);

        $agreement_attributes = $this->tutorAgreementAttributeRepository->get();

        return view($this->_config['view'])
            ->with(compact('tutor_application', 'agreement_attributes', 'tutor_agreement'));
    }

    public function reject($id)
    {
        $tutor_application = $this->tutorApplicationSubmissionRepository
            ->with(['tutor_application'])
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
        $tutor_application_submission = $this->tutorApplicationSubmissionRepository
            ->with(['tutor_application'])
            ->find($id);

        $tutor_application_submission->update([
            'status' => TutorApplicationSubmissionRepository::APPROVED
        ]);

        $tutor_profile = $this->tutorProfileRepository->create([
            'user_id' => $tutor_application_submission->tutor_application->user_id,
            'name' => $tutor_application_submission->tutor_application->name,
            'title' => $tutor_application_submission->tutor_application->title,
            'phone' => $tutor_application_submission->tutor_application->phone,
            'description' => $tutor_application_submission->tutor_application->description,
            'photo' => $tutor_application_submission->tutor_application->photo,
            'tutor_application_id' => $tutor_application_submission->tutor_application->id
        ]);

        $user = $this->userRepository->find($tutor_profile->user_id);

        $user->forceFill(['tutor_id' => $tutor_profile->id]);

        if ($user->update()) {
            session()->flash('success', 'Tutor application was successfully approved');
        } else {
            session()->flash('error', 'Tutor application could not be approved. Please try again.');
        }
        return redirect()->route($this->_config['redirect']);
    }

}
