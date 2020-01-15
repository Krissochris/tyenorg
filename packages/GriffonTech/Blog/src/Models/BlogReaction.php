<?php

namespace GriffonTech\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use GriffonTech\Blog\Contracts\BlogReaction as BlogReactionContract;

class BlogReaction extends Model implements BlogReactionContract
{

    protected $fillable = ['blog_id', 'user_id', 'reaction'];
}
