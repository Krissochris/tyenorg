<?php


namespace GriffonTech\Course\Models;


use Illuminate\Database\Eloquent\Model;
use GriffonTech\Course\Contracts\CourseComment as CourseCommentContract;

class CourseComment extends Model implements CourseCommentContract
{
    protected $table = 'course_comments';

    protected $fillable = [
        'course_id',
        'note'
    ];

    public function course()
    {
        return $this->belongsTo(CourseProxy::modelClass(), 'course_id', 'id');
    }

}
