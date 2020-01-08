<?php

namespace GriffonTech\Core\Models;

use Illuminate\Database\Eloquent\Model;
use GriffonTech\Core\Contracts\Country as CountryContract;

class Country extends Model implements CountryContract
{
    public $timestamps = false;
}