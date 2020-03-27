<?php

namespace GriffonTech\Course\Repositories;


use GriffonTech\Core\Eloquent\Repository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Course Repository
 *
 * @author    Johnbosco Omebe <johnboscoomebe@thegriffontechnology.com>
 * @copyright 2020 Griffon Technologies Nig (http://www.thegriffontechnologies.com)
 */
class CourseRepository extends Repository
{
    CONST FREE = 'free';
    CONST PRO_USER_FREE = 'pro_user_free';
    CONST PRO_MEMBER_PAID = 'pro_user_paid';

    CONST STATUS_ACTIVE = 1;
    CONST STATUS_UNACTIVE = -1;

    CONST TYPE = [
        CourseRepository::FREE => 'Free Course',
        CourseRepository::PRO_USER_FREE => 'Pro User Free',
        CourseRepository::PRO_MEMBER_PAID => 'Pro User paid'
    ];

    CONST STATUS = [
        CourseRepository::STATUS_ACTIVE => 'Active',
        CourseRepository::STATUS_UNACTIVE => 'UnActive'
    ];

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'GriffonTech\Course\Contracts\Course';
    }

    /**
     * Retrive product from slug
     *
     * @param string $slug
     * @return mixed
     */
    public function findBySlugOrFail($slug, $columns = null)
    {
        $course = $this->findOneWhere([
            'url_key' => $slug,
        ]);

        if (! $course) {
            throw (new ModelNotFoundException)->setModel(
                get_class($this->model), $slug
            );
        }

        return $course;
    }

    public function findTutorCourses($tutor_id, $columns = '*')
    {
        return $this->model->query()
            ->select($columns)
            ->where('tutor_id', $tutor_id)
            ->get();
    }

    public function findActiveCoursesBatches(array $course_ids)
    {
        $courseBatchRepository = $this->app->make(CourseBatchRepository::class);
        return
        $courseBatchRepository
        ->model->query()
            ->where('status', 1)
            ->whereIn('course_id', $course_ids)
            ->limit(5)
            ->orderBy('no_of_users', 'desc')
            ->get();
    }

    public function create(array $attributes)
    {
        $attributes['url_key'] = str_slug($attributes['name']);
        return parent::create($attributes);
    }

    public function update(array $attributes, $id)
    {
        if ($attributes['approved_on']) {
            $attributes['approved_on'] = now();
        } else {
            $attributes['approved_on'] = null;
        }

        if ($attributes['active']) {
            $attributes['active'] = 1;
            $attributes['status'] = 1;
        } else {
            $attributes['active'] = 0;
            $attributes['status'] = 0;
        }

        return parent::update($attributes, $id);
    }


}
