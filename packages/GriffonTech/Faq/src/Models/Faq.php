<?php

namespace GriffonTech\Faq\Models;

use Illuminate\Database\Eloquent\Model;
use GriffonTech\Faq\Contracts\Faq as FaqContract;

class Faq extends Model implements FaqContract
{

    protected $table = 'faqs';

    protected $fillable = [
        'question', 'answer', 'status', 'order'
    ];
}