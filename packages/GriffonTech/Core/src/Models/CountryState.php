<?php

namespace GriffonTech\Core\Models;

use Illuminate\Database\Eloquent\Model;
use GriffonTech\Core\Contracts\CountryState as CountryStateContract;


class CountryState extends Model implements CountryStateContract
{
    public $timestamps = false;
}