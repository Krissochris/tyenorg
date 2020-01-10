<?php

namespace GriffonTech\Course\Repositories;

use GriffonTech\Core\Eloquent\Repository;

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
}