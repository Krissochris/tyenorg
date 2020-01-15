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
    CONST PRO_MEMBER_PAID = 'po_member_paid';

    CONST TYPE = [
        CourseRepository::FREE => 'Free Course',
        CourseRepository::PRO_USER_FREE => 'Pro User Free',
        CourseRepository::PRO_MEMBER_PAID => 'Pro User paid'
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

    public function create(array $attributes)
    {
        $attributes['url_key'] = str_slug($attributes['name']);
        return parent::create($attributes);
    }


}