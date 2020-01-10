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
        return $this->model->with([
            'course',
            ])
            ->where('user_id', $user_id)
            ->latest()
            ->get();
    }

}