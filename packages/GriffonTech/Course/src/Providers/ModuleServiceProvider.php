<?php

namespace GriffonTech\Course\Providers;

use Konekt\Concord\BaseModuleServiceProvider;
use \GriffonTech\Course\Models\Course;
use \GriffonTech\Course\Models\CourseBatch;
use \GriffonTech\Course\Models\CourseCategory;
use \GriffonTech\Course\Models\CourseRegistration;
use \GriffonTech\Course\Models\CourseReview;

class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        Course::class,
        CourseBatch::class,
        CourseCategory::class,
        CourseRegistration::class,
        CourseReview::class,
    ];
}