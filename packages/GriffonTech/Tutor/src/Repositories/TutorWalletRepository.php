<?php

namespace GriffonTech\Tutor\Repositories;

use Illuminate\Container\Container as App;
use GriffonTech\Core\Eloquent\Repository;

/**
 * TutorWallet Repository
 *
 * @author    Omebe Johnbosco <johnboscoomebe@thegriffontechnology.com.com>
 * @copyright 2020 Griffon Technology Nig (http://www.thegriffontechnology.com)
 */
class TutorWalletRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'GriffonTech\Tutor\Contracts\TutorWallet';
    }
}