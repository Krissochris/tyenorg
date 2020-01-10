<?php

namespace GriffonTech\Course\Repositories;


use GriffonTech\Core\Eloquent\Repository;

/**
 * CourseReview Repository
 *
 * @author    Johnbosco Omebe <johnboscoomebe@thegriffontechnology.com>
 * @copyright 2020 Griffon Technologies Nig (http://www.thegriffontechnologies.com)
 */
class CourseReviewRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'GriffonTech\Course\Contracts\CourseReview';
    }
}