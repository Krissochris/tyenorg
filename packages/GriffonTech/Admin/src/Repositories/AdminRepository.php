<?php


namespace GriffonTech\Admin\Repositories;


use GriffonTech\Core\Eloquent\Repository;

class AdminRepository extends Repository
{
    public function model()
    {
        return 'GriffonTech\Admin\Contracts\Admin';
    }
}
