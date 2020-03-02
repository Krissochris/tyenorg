<?php


namespace GriffonTech\Tutor\Repositories;


use GriffonTech\Core\Eloquent\Repository;
use GriffonTech\Tutor\Contracts\TutorApplicationSubmission;

class TutorApplicationSubmissionRepository extends Repository
{
    CONST ACTIVE = 1;
    CONST APPROVED = 2;
    CONST CANCELLED = -1;

    public function model()
    {
        return TutorApplicationSubmission::class;
    }

}
