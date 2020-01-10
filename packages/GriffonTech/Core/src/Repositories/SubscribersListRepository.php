<?php

namespace GriffonTech\Core\Repositories;

use Illuminate\Container\Container as App;
use GriffonTech\Core\Eloquent\Repository;

/**
 * SubscribersList Repository
 *
 * @author    Johnbosco Omebe <johnboscoomebe@thegriffontechnology.com>
 * @copyright 2020 Griffon Technologies Nig (http://www.thegriffontechnologies.com)
 */
class SubscribersListRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'GriffonTech\Core\Contracts\SubscribersList';
    }


    /**
     * Delete a slider item and delete the image from the disk or where ever it is
     *
     * @return Boolean
     */
    public function destroy($id) {
        return $this->model->destroy($id);
    }
}