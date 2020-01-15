<?php

namespace GriffonTech\Blog\Repositories;

use GriffonTech\Core\Eloquent\Repository;

class BlogCommentRepository extends Repository
{
    public function model()
    {
        return 'GriffonTech\Blog\Contracts\BlogComment';
    }
}