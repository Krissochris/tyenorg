<?php

namespace GriffonTech\Core\Models;

use Illuminate\Database\Eloquent\Model;
use GriffonTech\Core\Contracts\CurrencyExchangeRate as CurrencyExchangeRateContract;

class CurrencyExchangeRate extends Model implements CurrencyExchangeRateContract
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'target_currency', 'rate'
    ];
}