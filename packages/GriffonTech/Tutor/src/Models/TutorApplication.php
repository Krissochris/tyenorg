<?php

namespace GriffonTech\Tutor\Models;

use GriffonTech\User\Models\UserProxy;
use Illuminate\Database\Eloquent\Model;
use \GriffonTech\Tutor\Contracts\TutorApplication as TutorApplicationContract;

class TutorApplication extends Model implements TutorApplicationContract
{

    protected $fillable = [
        'user_id','first_name', 'last_name', 'title', 'description', 'photo','phone','email',
    ];

    public function user()
    {
        return $this->belongsTo(UserProxy::modelClass(), 'user_id', 'id');
    }

}
