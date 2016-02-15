<?php namespace App\Products\Traits;

use App\Products\Product;

trait AffiliateProvider {
    public function product()
    {
        return $this->morphOne(Product::class, 'providable');
    }
}