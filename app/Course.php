<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title', 'description', 'tutor_id', 'total_no_of_users_in_batch', 'total_no_of_referrals', 'photo', 'price', 'status'
    ];
}
