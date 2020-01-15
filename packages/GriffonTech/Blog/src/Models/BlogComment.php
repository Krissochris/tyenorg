<?php

namespace GriffonTech\Blog\Models;

use GriffonTech\User\Models\UserProxy;
use Illuminate\Database\Eloquent\Model;
use GriffonTech\Blog\Contracts\BlogComment as BlogCommentContract;

class BlogComment extends Model implements BlogCommentContract
{

    protected $fillable = [
        'blog_id', 'user_id', 'comment', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(UserProxy::modelClass(), 'user_id', 'id');
    }


    public function blog()
    {
        return $this->belongsTo(BlogProxy::modelClass(), 'blog_id', 'id');
    }
}