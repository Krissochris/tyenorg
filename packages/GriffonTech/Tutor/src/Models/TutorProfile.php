<?php

namespace GriffonTech\Tutor\Models;

use GriffonTech\User\Models\UserProxy;
use Illuminate\Database\Eloquent\Model;
use \GriffonTech\Tutor\Contracts\TutorProfile as TutorContract;

class TutorProfile extends Model implements TutorContract
{

    protected $fillable = [
        'user_id', 'title', 'description', 'photo','phone_number','email',
        'facebook_url', 'website_url', 'linkedIn_url', 'youtube_url',
    ];

    public function user()
    {
        return $this->belongsTo(UserProxy::modelClass(), 'user_id', 'id');
    }

    public function tutor_application_courses()
    {
        return $this->hasMany(TutorCourseProxy::modelClass(), 'tutor_id', 'id');
    }

}
