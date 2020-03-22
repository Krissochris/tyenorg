<?php


namespace GriffonTech\Blog\Repositories;


use GriffonTech\Core\Eloquent\Repository;

class BlogCategoryRepository extends Repository
{

    public function model()
    {
        return 'GriffonTech\Blog\Contracts\BlogCategory';
    }
}
