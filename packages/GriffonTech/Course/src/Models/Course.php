<?php

namespace GriffonTech\Course\Models;

use Illuminate\Database\Eloquent\Model;
use GriffonTech\Course\Contracts\Course as CourseContract;

class Course extends Model implements CourseContract
{
    protected $fillable = [
        'title', 'description', 'tutor_id',
        'total_no_of_users_in_batch', 'total_no_of_referrals', 'course_category_id',
        'photo', 'price', 'status'
    ];


    public function course_category()
    {
        return $this->belongsTo(CourseCategoryProxy::modelClass(), 'course_category_id', 'id');
    }
}