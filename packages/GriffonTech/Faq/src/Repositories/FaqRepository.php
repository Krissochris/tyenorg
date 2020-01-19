<?php

namespace GriffonTech\Faq\Repositories;

use GriffonTech\Core\Eloquent\Repository;

class FaqRepository extends Repository
{

    CONST PUBLISHED = 1;
    CONST UNPUBLISHED = 0;

    CONST STATUS = [
        FaqRepository::PUBLISHED => 'Published',
        FaqRepository::UNPUBLISHED => 'UnPublished'
    ];


    public function model()
    {
        return 'GriffonTech\Faq\Contracts\Faq';
    }
}