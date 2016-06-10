<?php

namespace App\Products;

use Illuminate\Database\Eloquent\Model;

class FeaturedProduct extends Model
{
    protected $fillable = ['description'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
