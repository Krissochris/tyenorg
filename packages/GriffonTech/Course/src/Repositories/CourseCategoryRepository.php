<?php

namespace GriffonTech\Course\Repositories;

use GriffonTech\Core\Eloquent\Repository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
/**
 * CourseCategory Repository
 *
 * @author    Johnbosco Omebe <johnboscoomebe@thegriffontechnology.com>
 * @copyright 2020 Griffon Technologies Nig (http://www.thegriffontechnologies.com)
 */
class CourseCategoryRepository extends Repository {

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'GriffonTech\Course\Contracts\CourseCategory';
    }

    public function getList($keyColumn = 'id', $valueColumn = 'name')
    {
        return $this->model->pluck($valueColumn, $keyColumn);
    }

    public function create(array $attributes)
    {
        $attributes['url_key'] = str_slug($attributes['name']);
        return parent::create($attributes);
    }

    public function findBySlugOrFail($slug, $columns = null)
    {
        $category = $this->findOneWhere([
            'url_key' => $slug,
        ]);

        if (! $category) {
            throw (new ModelNotFoundException)->setModel(
                get_class($this->model), $slug
            );
        }

        return $category;
    }

    public function findCourses($id, $columns = ['*'])
    {
        $courses = app(CourseRepository::class)
            ->findWhere(['course_category_id'=> $id], $columns);

        return $courses;
    }
}