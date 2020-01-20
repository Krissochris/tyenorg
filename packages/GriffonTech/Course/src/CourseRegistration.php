<?php


namespace GriffonTech\Course;

use GriffonTech\Course\Repositories\CourseBatchRepository;
use GriffonTech\Course\Repositories\CourseRegistrationRepository;
use GriffonTech\Course\Repositories\CourseRepository;

class CourseRegistration
{
    protected $courseRepository;

    protected $courseBatchRepository;

    protected $courseRegistrationRepository;

    public function __construct(
        CourseRepository $courseRepository,
        CourseBatchRepository $courseBatchRepository,
        CourseRegistrationRepository $courseRegistrationRepository
    )
    {

        $this->courseRepository = $courseRepository;

        $this->courseBatchRepository = $courseBatchRepository;

        $this->courseRegistrationRepository = $courseRegistrationRepository;
    }

    public function registerStudent($course_id, $user_id)
    {
        $course = $this->courseRepository->find($course_id);

        // check if the course has a batch
        $course_batch = $course->course_batches()
            ->where('entry_status', 1)
            ->first();

        if (!$course_batch) {
            $course_batch = $this->courseBatchRepository->create([
                'course_id' => $course->id,
                'tutor_id' => $course->tutor_id,
                'maximum_number_of_users' => $course->total_no_of_users_in_batch,
            ]);
        }

        $course_batch->no_of_users += 1;
        if ($course_batch->no_of_users == $course_batch->maximum_number_of_users) {
            $course_batch->_entry_status = 0;
        }

        $courseBatchUpdated = $course_batch->update();

        if ($courseBatchUpdated) {

            $courseRegistration = $this->courseRegistrationRepository->create([
                'user_id' => $user_id,
                'course_id' => $course->id,
                'batch_id' => $course_batch->id
            ]);

            if ($courseRegistration) {
                return true;
            }
        }

        return false;
    }
}