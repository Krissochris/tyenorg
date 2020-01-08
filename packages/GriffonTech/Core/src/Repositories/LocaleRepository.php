<?php

namespace GriffonTech\Core\Repositories;

use GriffonTech\Core\Eloquent\Repository;

/**
 * Locale Repository
 *
 * @author    Johnbosco Omebe <johnboscoomebe@thegriffontechnology.com>
 * @copyright 2020 Griffon Technologies Nig (http://www.thegriffontechnologies.com)
 */
class LocaleRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'GriffonTech\Core\Contracts\Locale';
    }
}