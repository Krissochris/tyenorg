<?php

namespace GriffonTech\Course\Models;

use Illuminate\Database\Eloquent\Model;
use GriffonTech\Course\Contracts\CourseReview as CourseReviewContract;

class CourseReview extends Model implements CourseReviewContract
{
    protected $fillable = [
        'user_id', 'course_id', 'course_batch_id', 'text', 'rating',
        'status'
    ];

    public function course()
    {
        return $this->belongsTo(CourseProxy::modelClass(), 'course_id', 'id');
    }

    public function course_batch_id()
    {
        return $this->belongsTo(CourseProxy::modelClass(), 'course_batch_id', 'id');
    }

}