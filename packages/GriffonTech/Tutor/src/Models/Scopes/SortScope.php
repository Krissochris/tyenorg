<?php


namespace GriffonTech\Tutor\Models\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class SortScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        return $builder->orderBy('sort_order', 'asc');
    }
}
