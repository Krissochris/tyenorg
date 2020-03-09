<?php

namespace GriffonTech\Course\Models;

use GriffonTech\Tutor\Models\TutorProfileProxy;
use GriffonTech\User\Models\UserProxy;
use Illuminate\Database\Eloquent\Model;
use GriffonTech\Course\Contracts\CourseBatch as CourseBatchContract;

class CourseBatch extends Model implements CourseBatchContract
{
    CONST STATUS_ACTIVE = 1;
    CONST STATUS_COMPLETED = 2;
    CONST STATUS_CANCELLED = -1;
    CONST STATUS_PAUSED = 0;



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
        return $this->belongsTo(TutorProfileProxy::modelClass(), 'tutor_id', 'id');
    }

    public function course_registrations()
    {
        return $this->hasMany(CourseRegistrationProxy::modelClass(), 'batch_id', 'id');
    }

    public function markCompleted()
    {
        return $this->update([
            'status' => static::STATUS_COMPLETED
        ]);
    }
}
