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

    public function createBatches($number = 1, $course)
    {
        $data = [];
        $data['tutor_id'] = $course->tutor_id;
        $data['course_id'] = $course->id;
        $data['maximum_number_of_users'] = $course->total_no_of_users_in_batch;
        for($num = 0; $num < $number; $num++) {

            $this->model->create($data);
        }
        return true;
    }
}