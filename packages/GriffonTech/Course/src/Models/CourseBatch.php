<?php

namespace GriffonTech\Course\Models;

use GriffonTech\User\Models\UserProxy;
use Illuminate\Database\Eloquent\Model;
use GriffonTech\Course\Contracts\CourseBatch as CourseBatchContract;

class CourseBatch extends Model implements CourseBatchContract
{
    protected $fillable = [
        'course_id', 'tutor_id', 'no_of_users', 'maximum_number_of_users',
        'entry_status', 'is_taken', 'time_completed', 'status'
    ];


    public function course()
    {
        return $this->belongsTo(CourseProxy::modelClass(), 'course_id', 'id');
    }

    public function tutor()
    {
        return $this->belongsTo(UserProxy::modelClass(), 'tutor_id', 'id');
    }
}