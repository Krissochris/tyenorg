<?php


namespace GriffonTech\User\Http\Controllers;


use GriffonTech\Tutor\Repositories\TutorAgreementAttributeRepository;
use GriffonTech\Tutor\Repositories\TutorAgreementAttributeValueRepository;
use GriffonTech\Tutor\Repositories\TutorAgreementRepository;
use GriffonTech\Tutor\Repositories\TutorApplicationRepository;
use GriffonTech\Tutor\Repositories\TutorApplicationSubmissionRepository;
use GriffonTech\Tutor\Repositories\TutorCourseRepository;
use GriffonTech\Tutor\Repositories\TutorProfileRepository;
use Illuminate\Http\Request;

class TutorApplicationController extends Controller
{
    protected $_config;

    protected $tutorApplicationRepository;

    protected $tutorProfileRepository;

    protected $tutorCourseRepository;
    protected $tutorApplicationSubmissionRepository;
    protected $tutorAgreementAttributeRepository;
    protected $tutorAgreementRepository;
    protected $tutorAgreementAttributeValueRepository;

    public function __construct(
        TutorApplicationRepository $tutorApplicationRepository,
        TutorCourseRepository $tutorCourseRepository,
        TutorApplicationSubmissionRepository $tutorApplicationSubmissionRepository,
        TutorAgreementAttributeRepository $tutorAgreementAttributeRepository,
        TutorAgreementRepository $tutorAgreementRepository,
        TutorAgreementAttributeValueRepository $tutorAgreementAttributeValueRepository
    )
    {
        $this->_config = request('_config');

        $this->tutorApplicationRepository = $tutorApplicationRepository;

        $this->tutorCourseRepository = $tutorCourseRepository;

        $this->tutorApplicationSubmissionRepository = $tutorApplicationSubmissionRepository;

        $this->tutorAgreementAttributeRepository = $tutorAgreementAttributeRepository;

        $this->tutorAgreementRepository = $tutorAgreementRepository;

        $this->tutorAgreementAttributeValueRepository = $tutorAgreementAttributeValueRepository;
    }


    public function create()
    {
        $tutor_application = $this->tutorApplicationRepository->findOneWhere([
            'user_id' => auth('user')->user()->id
        ]);

        if ($tutor_application) {

            $tutor_application_submission = $this->tutorApplicationSubmissionRepository
                ->findWhere([
                    'tutor_application_id' => $tutor_application->id,
                ])->last();

            if ($tutor_application_submission &&
                $tutor_application_submission->status === TutorApplicationSubmissionRepository::ACTIVE) {
                return view('shop::user.tutor_application.under_review')
                    ->with(compact('tutor_application_submission'));
            }
            return view($this->_config['view'])->with(compact('tutor_application'));
        }

        return view($this->_config['view']);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'phone' => 'required',
        ]);

        $tutorApplication = $this->tutorApplicationRepository->firstOrCreate([
            'user_id' => auth('user')->user()->id
        ]);

        $tutorApplication->forceFill($request->only(['name' , 'title',
            'phone', 'description', 'state_of_residence_id']));

        if ($tutorApplication->update()) {
            session()->flash('success', 'Your information was successfully saved');
        } else {
            session()->flash('error', 'Your information could not be saved.Please try again');
        }

        return redirect()->route($this->_config['redirect']);
    }


    public function getNewCourseForm()
    {
        return view($this->_config['view']);
    }


    public function addCourses()
    {
        $tutorProfile = $this->tutorApplicationRepository->findOneWhere([
            'user_id' => auth('user')->user()->id
        ], ['user_id', 'id']);

        $tutorCourses = $this->tutorCourseRepository
            ->findWhere(['tutor_application_id' => $tutorProfile->id]);

        return view($this->_config['view'])->with(compact('tutorProfile', 'tutorCourses'));
    }


    public function processAddCourses(Request $request)
    {
        $postData = $request->all();

        if (!empty($postData['courses'])) {
            $courses = 0;
            foreach ($postData['courses'] as $course) {
                if (
                    (isset($course['course_name']) && !empty($course['course_name'])) &&
                    (isset($course['course_experience_and_qualification']) && !empty($course['course_experience_and_qualification'])) &&
                    (isset($course['how_well_can_u_tutor_course']) && !empty($course['how_well_can_u_tutor_course'])) &&
                    (isset($course['how_much_would_you_charge_per_student']) && !empty($course['how_much_would_you_charge_per_student'])) &&
                    (isset($course['would_you_be_willing_to_repeat_a_batch']) && !empty($course['would_you_be_willing_to_repeat_a_batch'])) &&
                    (isset($course['do_you_agree_to_carry_student_along_after_batch_ends']) && !empty($course['do_you_agree_to_carry_student_along_after_batch_ends']))
                ) {
                    $course = $this->tutorCourseRepository->create([
                        'tutor_application_id' => $postData['tutor_id'],
                        'course_name' => $course['course_name'],
                        'course_experience_and_qualification' => $course['course_experience_and_qualification'],
                        'how_well_can_u_tutor_course' => $course['how_well_can_u_tutor_course'],
                        'how_much_would_you_charge_per_student' => $course['how_much_would_you_charge_per_student'],
                        'would_you_be_willing_to_repeat_a_batch' => $course['would_you_be_willing_to_repeat_a_batch'],
                        'do_you_agree_to_carry_student_along_after_batch_ends' => $course['do_you_agree_to_carry_student_along_after_batch_ends'],
                    ]);
                    if ($course) {
                        $courses++;
                    }
                }
            }
            if ($courses) {
                session()->flash('success', 'Your courses were successfully added!');
                return redirect()->route('user.tutor_application.preview');
            }
        }
        return redirect()->route($this->_config['redirect']);
    }


    public function preview()
    {
        $tutorApplication = $this->tutorApplicationRepository
            ->findOneWhere([
                'user_id' => auth('user')->user()->id
            ]);

        $tutor_agreement = $this->tutorAgreementRepository->findOneByField('tutor_application_id', $tutorApplication->id);

        $attributes = $this->tutorAgreementAttributeRepository
            ->getModel()
            ->query()
            ->orderBy('position')
            ->get();

        /*$tutorCourses = $this->tutorCourseRepository
            ->findWhere([
                'tutor_application_id' => $tutorApplication->id
            ]);*/

        return view($this->_config['view'])
            ->with(compact('tutorApplication', 'attributes', 'tutor_agreement'));
    }



    public function submitApplication(Request $request)
    {
        $request->validate([
            'term_and_service_agreement' => 'required'
        ]);

        $tutorApplication = $this->tutorApplicationRepository->findOneWhere([
            'user_id' => auth('user')->user()->id
        ], ['user_id','id']);


        if (!$tutorApplication) {
            session()->flash('error', 'An error occurred while submitting your application. Please try again.');
            return redirect()->route($this->_config['redirect']);
        }

        $tutorApplicationSubmission = $this->tutorApplicationSubmissionRepository->create([
            'tutor_application_id' => $tutorApplication->id
        ]);

        if ($tutorApplicationSubmission) {
            session()->flash('success', 'Your tutor application form was successfully submitted. We will process it shortly and give your response.');
        } else {
            session()->flash('error', 'Your application could not be submitted successfully. Please contact the administrators. Thank you');
        }
        return redirect()->route($this->_config['redirect']);
    }


    public function deleteCourse ($tutor_course_id)
    {
        if ($this->tutorCourseRepository->delete($tutor_course_id)) {
            session()->flash('success', 'Course was successfully removed.');
        } else {
            session()->flash('error', 'Course could not be removed. Please try again later');
        }
        return redirect()->back();
    }

    public function createAgreement()
    {
        $attributes = $this->tutorAgreementAttributeRepository
            ->getModel()
            ->query()
            ->orderBy('position')
            ->get();

        $tutorApplication = $this->tutorApplicationRepository->findOneWhere([
            'user_id' => auth('user')->user()->id
        ], ['user_id','id']);

        $tutor_agreement = $this->tutorAgreementRepository
            ->findOneByField('tutor_application_id', $tutorApplication->id);

        if (is_null($tutor_agreement)) {
            $tutor_agreement = $this->tutorAgreementRepository->create([
                'tutor_application_id' => $tutorApplication->id
            ]);
        }

        return view($this->_config['view'])
            ->with(compact('tutor_agreement', 'attributes'));
    }


    public function storeAgreement(Request $request, $id)
    {
        $updated = $this->tutorAgreementRepository->update($request->input(), $id);
        if ($updated) {
            session()->flash('success', 'Tutor agreement was successfully updated');
        } else {
            session()->flash('error', 'Tutor agreement could not be updated.Please try again.');
        }
        return back();
    }
}
