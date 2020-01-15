<?php

namespace GriffonTech\Blog\Repositories;

use GriffonTech\Core\Eloquent\Repository;

class BlogReactionRepository extends Repository
{

    public function model()
    {
        return 'GriffonTech\Blog\Contracts\BlogReaction';
    }


}