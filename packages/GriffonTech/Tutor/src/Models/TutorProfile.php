<?php

namespace GriffonTech\Tutor\Models;

use Illuminate\Database\Eloquent\Model;
use \GriffonTech\Tutor\Contracts\TutorProfile as TutorContract;

class TutorProfile extends Model implements TutorContract
{
    protected $fillable = [];
}