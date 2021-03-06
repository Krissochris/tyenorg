<?php

namespace GriffonTech\Course\Models;

use GriffonTech\Tutor\Models\TutorProfileProxy;
use GriffonTech\User\Models\UserProxy;
use Illuminate\Database\Eloquent\Model;
use GriffonTech\Course\Contracts\Course as CourseContract;

class Course extends Model implements CourseContract
{

    public static $_status = [
        '-1' => 'Paused',
        '0' => 'Draft',
        '1' => 'Complete'
    ];


    protected $fillable = [
        'name',
        'description',
        'tutor_id',
        'url_key',
        'summary',
        'total_no_of_users_in_batch',
        'total_no_of_referrals_needed',
        'course_category_id',
        'photo',
        'price',
        'status',
        'learning_url',
        'learning_url_2',
        'amount_per_student',
        'video_url',
        'type',
        'approved_on',
        'active'
    ];


    public function course_category()
    {
        return $this->belongsTo(CourseCategoryProxy::modelClass(), 'course_category_id', 'id');
    }

    public function course_batches()
    {
        return $this->hasMany(CourseBatchProxy::modelClass(), 'course_id', 'id');
    }

    public function tutor()
    {
        return $this->belongsTo(TutorProfileProxy::modelClass(), 'tutor_id', 'id');
    }

    public function course_registrations()
    {
        return $this->hasMany(CourseRegistrationProxy::modelClass(), 'course_id', 'id');
    }

    public function course_reviews()
    {
        return $this->hasMany(CourseReviewProxy::modelClass(), 'course_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(CourseCommentProxy::modelClass(), 'course_id', 'id');
    }

    public function deactivate()
    {
        return $this->update([
            'status' => -1
        ]);
    }

    public function activate()
    {
        return $this->update([
            'status' => 1
        ]);
    }

    public function getStatus()
    {
        switch ($this->status) {
            case 0:
                return 'UnActive';
            case  1:
                return 'Active';
            default:
                return 'Unknown';
        }
    }
}
