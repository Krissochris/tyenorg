<?php

namespace GriffonTech\User\Repositories;

use Illuminate\Container\Container as App;
use GriffonTech\Core\Eloquent\Repository;

/**
 * User Repository
 *
 * @author    Omebe Johnbosco <johnboscoomebe@thegriffontechnology.com.com>
 * @copyright 2020 Griffon Technology Nig (http://www.thegriffontechnology.com)
 */
class ReferralRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'GriffonTech\User\Contracts\Referral';
    }
}