<?php

namespace GriffonTech\Course\Repositories;

use GriffonTech\Core\Eloquent\Repository;

/**
 * CourseBatch Repository
 *
 * @author    Johnbosco Omebe <johnboscoomebe@thegriffontechnology.com>
 * @copyright 2020 Griffon Technologies Nig (http://www.thegriffontechnologies.com)
 */
class CourseBatchRepository extends Repository {

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'GriffonTech\Course\Contracts\CourseBatch';
    }
}