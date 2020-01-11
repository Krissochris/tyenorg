<?php

namespace GriffonTech\Course\Models;

use Illuminate\Database\Eloquent\Model;
use GriffonTech\Course\Contracts\CourseRegistration as CourseRegistrationContract;

class CourseRegistration extends Model implements CourseRegistrationContract
{
    protected $fillable = [
        'user_id', 'course_id', 'batch_id',
        'access_type', 'status'
    ];

    public function course()
    {
        return $this->belongsTo(CourseProxy::modelClass(), 'course_id', 'id');
    }

    public function course_batch()
    {
        return $this->belongsTo(CourseBatchProxy::modelClass(), 'batch_id', 'id');
    }

}