<?php

namespace App\Products;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class FilterProduct
{
    public static function apply(Request $filters, $paginated = true)
    {
        $query = static::applyDecoratorsFromRequest($filters, (new Product)->newQuery());

        return ($paginated) ? static::getPaginatedResults($query) : static::getResults($query);
    }

    private static function applyDecoratorsFromRequest(Request $request, Builder $query)
    {
        foreach ($request->all() as $filterName => $value) {
            $decorator = static::createFilterDecorator($filterName);
            if (static::isValidDecorator($decorator)) {
                $query = $decorator::apply($query, $value);
            }
        }
        return $query;
    }

    private static function createFilterDecorator($name)
    {
        return __NAMESPACE__ . '\\Filters\\' . studly_case($name);
    }

    private static function isValidDecorator($decorator)
    {
        return class_exists($decorator);
    }

    private static function getPaginatedResults(Builder $query)
    {
        return $query->paginate(config('settings.products.results'));
    }

    private static function getResults(Builder $query)
    {
        return $query->get();
    }
}