<?php


namespace GriffonTech\Tutor\Models;


use Illuminate\Database\Eloquent\Model;
use GriffonTech\Tutor\Contracts\TutorCourse as TutorCourseContract;

class TutorCourse extends Model implements TutorCourseContract
{

    protected $table = 'tutor_courses';

    protected $fillable = [
        'tutor_id', 'course_name', 'course_experience_&_qualification', 'how_well_can_u_tutor_course',
        'how_much_would_you_charge_per_student', 'would_you_be_willing_to_repeat_a_batch',
        'do_you_agree_to_carry_student_along_after_batch_ends'
    ];


}
