<?php

namespace GriffonTech\Blog\Repositories;

use GriffonTech\Core\Eloquent\Repository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BlogRepository extends Repository
{

    public function model()
    {
        return 'GriffonTech\Blog\Contracts\Blog';
    }

    public function findBySlugOrFail($slug, $columns = null)
    {
        $blog = $this->findOneWhere([
            'url_key' => $slug,
        ]);

        if (! $blog) {
            throw (new ModelNotFoundException)->setModel(
                get_class($this->model), $slug
            );
        }

        return $blog;
    }

    public function create(array $attributes)
    {
        $attributes['url_key'] = str_slug($attributes['title']);

        return parent::create($attributes);
    }
}
