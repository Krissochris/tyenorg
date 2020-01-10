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
        $course = $this->model->findOneWhere([
            'url_key' => $slug,
        ]);

        if (! $course) {
            throw (new ModelNotFoundException)->setModel(
                get_class($this->model), $slug
            );
        }

        return $course;
    }

    public function create(array $attributes)
    {
        $attributes['url_key'] = str_slug($attributes['name']);
        return parent::create($attributes);
    }


}