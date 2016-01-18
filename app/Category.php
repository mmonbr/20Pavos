<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Kalnoy\Nestedset\Node;

class Category extends Node implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = ['build_from' => 'name'];

    protected $fillable = ['name'];

    /*
     * Relations
     */

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    /*
     * Methods
     */

    public function addProduct($product)
    {
        $this->products()->attach($product);
    }

    public function addProducts($products)
    {
        foreach ($products as $product) {
            $this->addProduct($product);
        }
    }

    public function getProductsCountAttribute()
    {
        if (!array_key_exists('productsCount', $this->relations)) $this->load('productsCount');

        if (is_null($this->getRelation('productsCount')->first())) return 0;

        return $this->getRelation('productsCount')->first()->aggregate;
    }

    public function productsCount()
    {
        return $this->products()
            ->selectRaw('count(*) as aggregate, category_id')
            ->groupBy('pivot_category_id');
    }

    /*
     * Helpers
     */

    public static function tree()
    {
        return static::get()->toTree()->toArray();
    }
}
