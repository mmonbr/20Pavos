<?php

namespace App\Products\Traits;

trait Scopable
{
    /**
     * Gets products between given price range.
     *
     * @param $query
     * @param $params
     * @return mixed
     */
    public function scopeFilter($query, $params)
    {
        $query->latest();

        if (isset($params['min_price'])) {
            $this->scopeMinimumPrice($query, $params['min_price']);
        }
        if (isset($params['max_price'])) {
            $this->scopeMaximumPrice($query, $params['max_price']);
        }

        return $query;
    }

    /**
     * Gets products below given price.
     *
     * @param $query
     * @param $price
     */
    public function scopeMinimumPrice($query, $price)
    {
        $query->where('price', '>=', $price);
    }

    /**
     * Gets products under given price.
     *
     * @param $query
     * @param $price
     */
    public function scopeMaximumPrice($query, $price)
    {
        $query->where('price', '<=', $price);
    }

    /**
     * Gets newest products.
     *
     * @param $query
     * @return mixed
     */
    public static function scopeRecent($query)
    {
        return $query->latest();
    }

    /**
     * Gets popular products.
     *
     * @param $query
     * @return mixed
     */
    public function scopePopular($query)
    {
        return $query->orderBy('hits', 'desc');
    }

    /**
     * Gets featured products.
     *
     * @param $query
     * @return mixed
     */
    public function scopeFeatured($query)
    {
        return $query
            ->with('attachments')
            ->where('featured', '=', true);
    }

    /*
     * Orders products by its price
     *
     * @param $query
     * @param string $order
     * @return mixed
     */
    /**
     * @param $query
     * @param string $order
     * @return mixed
     */
    public function scopePrice($query, $order = 'asc')
    {
        return $query->orderBy('price', $order);
    }

    /**
     * Gets cheapest products in ascending order.
     *
     * @param $query
     * @return mixed
     */
    public function scopeCheap($query)
    {
        return $query->price();
    }

    /**
     * Gets a random product.
     *
     * @param $query
     * @return mixed
     */
    public static function scopeRandom($query)
    {
        return $query->orderBy(\DB::raw('RAND()'))->first();
    }
}
