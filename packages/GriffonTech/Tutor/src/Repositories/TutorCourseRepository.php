<?php


namespace GriffonTech\Tutor\Repositories;


use GriffonTech\Core\Eloquent\Repository;
use GriffonTech\Tutor\Contracts\TutorCourse;

class TutorCourseRepository extends Repository
{

    public function model()
    {
        return TutorCourse::class;
    }
}
