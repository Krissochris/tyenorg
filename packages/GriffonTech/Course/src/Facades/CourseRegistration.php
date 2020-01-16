<?php

namespace GriffonTech\Course\Facades;

use Illuminate\Support\Facades\Facade;

class CourseRegistration extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'CourseRegistration';
    }
}