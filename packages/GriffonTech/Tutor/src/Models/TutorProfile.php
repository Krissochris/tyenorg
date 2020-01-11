<?php

namespace GriffonTech\Tutor\Models;

use Illuminate\Database\Eloquent\Model;
use \GriffonTech\Tutor\Contracts\TutorProfile as TutorContract;

class TutorProfile extends Model implements TutorContract
{

    protected $fillable = [
        'user_id', 'title', 'description', 'photo','phone','email',
        'facebook_url', 'website_url', 'linkedIn_url', 'youtube_url',
    ];

}