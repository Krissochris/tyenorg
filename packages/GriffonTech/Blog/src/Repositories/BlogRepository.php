<?php

namespace GriffonTech\Blog\Repositories;

use GriffonTech\Core\Eloquent\Repository;

class BlogRepository extends Repository
{

    public function model()
    {
        return 'GriffonTech\Blog\Contracts\Blog';
    }

    public function create(array $attributes)
    {
        $attributes['url_key'] = str_slug($attributes['title']);

        return parent::create($attributes);
    }
}