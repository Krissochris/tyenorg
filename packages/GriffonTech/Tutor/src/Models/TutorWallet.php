<?php

namespace GriffonTech\Tutor\Models;

use Illuminate\Database\Eloquent\Model;
use \GriffonTech\Tutor\Contracts\TutorWallet as TutorWalletContract;

class TutorWallet extends Model implements TutorWalletContract
{
    protected $fillable = [];
}