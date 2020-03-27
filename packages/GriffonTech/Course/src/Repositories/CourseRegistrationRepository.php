<?php

namespace GriffonTech\Course\Repositories;


use GriffonTech\Core\Eloquent\Repository;

/**
 * CourseRegistration Repository
 *
 * @author    Johnbosco Omebe <johnboscoomebe@thegriffontechnology.com>
 * @copyright 2020 Griffon Technologies Nig (http://www.thegriffontechnologies.com)
 */
class CourseRegistrationRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'GriffonTech\Course\Contracts\CourseRegistration';
    }

    public function getUserCourses($user_id)
    {
        $courses_ids = $this->model
            ->query()
            ->where('user_id', $user_id)
            ->pluck('course_id')
            ->toArray();

        return app(CourseRepository::class)
            ->with(['course_reviews'])
            ->findWhereIn('id', $courses_ids)
            ->map(function($row){
                $row->course_average_rating =
                    $row->course_reviews->average('rating');
                $row->total_reviews = $row->course_reviews->count();
               return $row;
            });
    }

    public function getRegistrationsForCourses(array $course_ids)
    {
        return $this->model->query()
            ->whereIn('course_id', $course_ids);
    }
}
