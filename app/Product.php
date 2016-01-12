<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Product extends Model
{
    use Eloquence;

    protected $searchableColumns = ['name', 'long_description', 'short_description', 'ASIN', 'hits'];

    public function isFeatured()
    {
        return !! $this->is_featured;
    }

    public function scopeFilter($query, $params)
    {
        if(isset($params['min_price'])){
            $query->where('current_price', '>=', $params['min_price']);

        }

        if(isset($params['max_price'])){
            $query->where('current_price', '<=', $params['max_price']);
        }

        return $query;
    }

    public static function popular($perPage = 21)
    {
        return self::orderBy('hits', 'DESC')->paginate($perPage);
    }

    public function hit()
    {
        return $this->increment('hits');
    }
}
