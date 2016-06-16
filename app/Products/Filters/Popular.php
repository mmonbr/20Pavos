<?php
namespace App\Products\Filters;

use App\Products\Contracts\Filter;
use Illuminate\Database\Eloquent\Builder;

class Popular implements Filter
{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param mixed $value
     * @return Builder $builder
     */
    public static function apply(Builder $builder, $value = 'DESC')
    {
        return $builder->orderBy('hits', $value);
    }
}