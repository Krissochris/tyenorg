<?php


namespace GriffonTech\Blog\Models;


use Illuminate\Database\Eloquent\Model;
use GriffonTech\Blog\Contracts\BlogCategory as BlogCategoryContract;

class BlogCategory extends Model implements BlogCategoryContract
{

    protected $table = 'blog_categories';

    protected $fillable = ['name', 'parent_id'];

    public function blog_posts()
    {
        return $this->hasMany(BlogProxy::modelClass(), 'blog_category_id', 'id');
    }

    public function child_categories()
    {
        return $this->hasMany(static::class, 'parent_id', 'id');
    }
}
