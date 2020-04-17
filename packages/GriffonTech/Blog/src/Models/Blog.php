<?php

namespace GriffonTech\Blog\Models;

use GriffonTech\User\Models\UserProxy;
use Illuminate\Database\Eloquent\Model;
use GriffonTech\Blog\Contracts\Blog as BlogContract;

class Blog extends Model implements BlogContract {

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'url_key',
        'status',
        'photo',
        'blog_category_id',
        'summary'
    ];


    public function user()
    {
        return $this->belongsTo(UserProxy::modelClass(), 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(BlogCommentProxy::modelClass(), 'blog_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(BlogCategoryProxy::modelClass(), 'blog_category_id', 'id');
    }
}
