<?php

namespace GriffonTech\Blog\Providers;

use GriffonTech\Blog\Models\Blog;
use GriffonTech\Blog\Models\BlogComment;
use GriffonTech\Blog\Models\BlogReaction;
use Konekt\Concord\BaseModuleServiceProvider;


class ModuleServiceProvider extends BaseModuleServiceProvider
{
    protected $models = [
        Blog::class,
        BlogComment::class,
        BlogReaction::class
    ];
}