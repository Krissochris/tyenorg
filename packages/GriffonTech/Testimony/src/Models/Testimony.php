<?php

namespace GriffonTech\Testimony\Models;

use GriffonTech\User\Models\UserProxy;
use Illuminate\Database\Eloquent\Model;
use GriffonTech\Testimony\Contracts\Testimony as TestimonyContract;

class Testimony extends Model implements TestimonyContract
{
    protected $table = 'testimonies';

    protected $fillable = [
        'user_id', 'testimony', 'status',
    ];


    public function user()
    {
        return $this->belongsTo(UserProxy::modelClass(), 'user_id', 'id');
    }
}