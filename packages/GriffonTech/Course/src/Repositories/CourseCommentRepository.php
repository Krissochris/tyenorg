<?php


namespace GriffonTech\Course\Repositories;


use GriffonTech\Core\Eloquent\Repository;
use GriffonTech\Course\Contracts\CourseComment;

class CourseCommentRepository extends Repository
{

    public function model()
    {
        return CourseComment::class;
    }

}
