<?php

namespace GriffonTech\Course\Models;

use Illuminate\Database\Eloquent\Model;
use GriffonTech\Course\Contracts\CourseCategory as CourseCategoryContract;

class CourseCategory extends Model implements CourseCategoryContract
{
    protected $fillable = [
        'name'
    ];

    public function courses()
    {
        return $this->hasMany(CourseProxy::modelClass(), 'course_category_id', 'id');
    }

}