<?php

namespace GriffonTech\Testimony\Repositories;

use GriffonTech\Core\Eloquent\Repository;

class TestimonyRepository extends Repository
{

    CONST PUBLISHED = 1;
    CONST UNPUBLISHED = 0;

    CONST STATUS = [
        TestimonyRepository::PUBLISHED => 'Published',
        TestimonyRepository::UNPUBLISHED => 'UnPublished'
    ];

    public function model()
    {
        return 'GriffonTech\Testimony\Contracts\Testimony';
    }
}