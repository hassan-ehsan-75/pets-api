<?php
/**
 * Created by PhpStorm.
 * User: Hasan Ehsan
 * Date: 7/27/2023
 * Time: 3:12 AM
 */

namespace App\Scopes;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class UserScope implements Scope
{

    public function apply(Builder $builder, Model $model)
    {
        $builder->where('type', 0);
    }

}