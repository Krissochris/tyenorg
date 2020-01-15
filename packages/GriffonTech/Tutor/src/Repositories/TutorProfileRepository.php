<?php

namespace GriffonTech\Tutor\Repositories;

use Illuminate\Container\Container as App;
use GriffonTech\Core\Eloquent\Repository;
use GriffonTech\User\Repositories\UserRepository;
/**
 * TutorProfile Repository
 *
 * @author    Omebe Johnbosco <johnboscoomebe@thegriffontechnology.com.com>
 * @copyright 2020 Griffon Technology Nig (http://www.thegriffontechnology.com)
 */
class TutorProfileRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'GriffonTech\Tutor\Contracts\TutorProfile';
    }

    public function getList($key = 'id', $value = 'name')
    {
        $tutors_user_ids = $this->pluck('user_id')->toArray();

        return $this->app->make(UserRepository::class)->findWhereIn('id', $tutors_user_ids)
            ->pluck($value, $key)->prepend('--Select Tutor--', '')->toArray();
    }
}