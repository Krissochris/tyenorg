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
    CONST STATUS = [
        '1' => 'Active',
        '-1' => 'UnActive'
    ];

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
        return $this->findWhere(['status' => 1])
            ->pluck($value, $key)
            ->toArray();
    }

    public function deactivateProfile($id)
    {
        $tutor = $this->findOrFail($id);
        return $tutor->deactivate();
    }

    public function activateProfile($id)
    {
        $tutor = $this->findOrFail($id);
        return $tutor->activate();
    }
}
