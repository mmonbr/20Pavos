<?php

namespace App;

use App\Traits\Categorizable;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Product extends Model implements SluggableInterface
{
    use Eloquence, Categorizable, SluggableTrait;

    protected $sluggable = ['build_from' => 'name'];

    protected $searchableColumns = ['name', 'long_description', 'short_description', 'ASIN', 'hits'];

    public function isFeatured()
    {
        return !! $this->is_featured;
    }

    public function hit()
    {
        return $this->increment('hits');
    }

    public function scopeFilter($query, $params)
    {
        $query->latest();

        if(isset($params['min_price'])){
            $query->where('current_price', '>=', $params['min_price']);
        }

        if(isset($params['max_price'])){
            $query->where('current_price', '<=', $params['max_price']);
        }

        if(isset($params['filtro']) && $params['filtro'] == 'nuevos'){
            $query->latest();
        }

        if(isset($params['filtro']) && $params['filtro'] == 'populares'){
            $query->orderBy('hits', 'DESC');
        }

        if(isset($params['filtro']) && $params['filtro'] == 'baratos'){
            $query->orderBy('current_price', 'ASC');
        }

        return $query;
    }

    public function scopeMinimumPrice($query, $price)
    {
        $query->where('current_price', '>=', $price);
    }

    public function scopeMaximumPrice($query, $price)
    {
        $query->where('current_price', '<=', $price);
    }

    public static function popular()
    {
        return self::orderBy('hits', 'DESC');
    }

    public static function cheap()
    {
        return self::orderBy('current_price', 'ASC');
    }

    public function related()
    {
        return $this->categories();
    }
}
