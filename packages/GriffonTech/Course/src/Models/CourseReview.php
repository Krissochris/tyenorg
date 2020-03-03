<?php

namespace GriffonTech\Course\Models;

use GriffonTech\User\Models\UserProxy;
use Illuminate\Database\Eloquent\Model;
use GriffonTech\Course\Contracts\CourseReview as CourseReviewContract;

class CourseReview extends Model implements CourseReviewContract
{
    protected $fillable = [
        'user_id', 'course_id', 'course_batch_id', 'review', 'rating',
        'status'
    ];

    public function course()
    {
        return $this->belongsTo(CourseProxy::modelClass(), 'course_id', 'id');
    }

    public function course_batch()
    {
        return $this->belongsTo(CourseBatchProxy::modelClass(), 'course_batch_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(UserProxy::modelClass(), 'user_id', 'id');
    }

}
