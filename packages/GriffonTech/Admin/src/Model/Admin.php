<?php

namespace GriffonTech\Admin\Model;

use \GriffonTech\Admin\Contracts\Admin as AdminContract;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable implements AdminContract
{
    protected $fillable = [
        'name', 'username', 'password', 'email', 'email_verified_at', 'phone_number',
        'photo', 'is_verified', 'status'
    ];
}
