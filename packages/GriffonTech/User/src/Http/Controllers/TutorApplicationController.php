<?php


namespace GriffonTech\User\Http\Controllers;


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

    public function __construct(
        TutorProfileRepository $tutorProfileRepository,
        TutorCourseRepository $tutorCourseRepository,
        TutorApplicationSubmissionRepository $tutorApplicationSubmissionRepository
    )
    {
        $this->_config = request('_config');

        $this->tutorProfileRepository = $tutorProfileRepository;

        $this->tutorCourseRepository = $tutorCourseRepository;

        $this->tutorApplicationSubmissionRepository = $tutorApplicationSubmissionRepository;
    }


    public function create()
    {
        $tutor_application = $this->tutorProfileRepository->firstOrCreate([
            'user_id' => auth('user')->user()->id
        ]);

        $tutor_application_submission = $this->tutorApplicationSubmissionRepository
            ->findWhere([
                'tutor_profile_id' => $tutor_application->id,
            ])->last();

        if ($tutor_application_submission->status === TutorApplicationSubmissionRepository::ACTIVE) {
            return view('shop::user.tutor_application.under_review')
                ->with(compact('tutor_application_submission'));
        }

        return view($this->_config['view'])->with(compact('tutor_application'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'phone_number' => 'required',
        ]);
        $tutorProfile = $this->tutorProfileRepository->findOneWhere([
            'user_id' => auth('user')->user()->id
        ]);
        $tutorProfile->forceFill($request->only(['name' , 'title',
            'phone_number', 'description', 'state_of_residence_id']));

        $tutorProfile->update();

        return redirect()->route($this->_config['redirect']);
    }


    public function getNewCourseForm()
    {
        return view($this->_config['view']);
    }


    public function addCourses()
    {
        $tutorProfile = $this->tutorProfileRepository->findOneWhere([
            'user_id' => auth('user')->user()->id
        ], ['user_id', 'id']);

        $tutorCourses = $this->tutorCourseRepository
            ->findWhere(['tutor_id' => $tutorProfile->id]);

        return view($this->_config['view'])->with(compact('tutorProfile', 'tutorCourses'));
    }


    public function processAddCourses(Request $request)
    {
        $postData = $request->all();

        if (!empty($postData['courses'])) {
            foreach ($postData['courses'] as $course) {

                $this->tutorCourseRepository->create([
                    'tutor_id' => $postData['tutor_id'],
                    'course_name' => $course['course_name'],
                    'course_experience_&_qualification' => $course['course_experience_&_qualification'],
                    'how_well_can_u_tutor_course' => $course['how_well_can_u_tutor_course'],
                    'how_much_would_you_charge_per_student' => $course['how_much_would_you_charge_per_student'],
                    'would_you_be_willing_to_repeat_a_batch' => $course['would_you_be_willing_to_repeat_a_batch'],
                    'do_you_agree_to_carry_student_along_after_batch_ends' => $course['do_you_agree_to_carry_student_along_after_batch_ends'],
                ]);

            }
            session()->flash('success', 'Your courses was successfully added!');
        }
        return redirect()->route($this->_config['redirect'], $postData['tutor_id']);
    }


    public function preview()
    {
        $tutorProfile = $this->tutorProfileRepository
            ->findOneByField(['user_id' => auth('user')->user()->id]);

        $tutorCourses = $this->tutorCourseRepository
            ->findWhere(['tutor_id' => $tutorProfile->id]);

        return view($this->_config['view'])->with(compact('tutorProfile', 'tutorCourses'));
    }

    public function submitApplication ()
    {
        $tutorProfile = $this->tutorProfileRepository->findOneWhere([
            'user_id' => auth('user')->user()->id
        ], ['user_id','id']);
        if (!$tutorProfile) {
            session()->flash('error', 'An error occurred while submitting your application. Please try again.');
        }
        $tutorApplicationSubmission = $this->tutorApplicationSubmissionRepository->create([
            'tutor_profile_id' => $tutorProfile->id
        ]);
        if ($tutorApplicationSubmission) {
            session()->flash('success', 'Your tutor application form was successfully submitted. Thank you.');

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
}
