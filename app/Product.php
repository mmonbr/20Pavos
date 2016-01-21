<?php

namespace App;

use App\Traits\Categorizable;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Product extends Model implements SluggableInterface
{
    use Eloquence, SluggableTrait;

    protected $sluggable = [
        'build_from' => 'name'
    ];

    protected $searchableColumns = [
        'name',
        'long_description',
        'short_description',
        'ASIN'
    ];

    protected $fillable = [
        'name',
        'long_description',
        'short_description',
        'current_price',
        'ASIN',
        'image_url',
        'referral_link',
        'is_featured'
    ];

    /*
     * Relations
     */

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /*
     * Methods
     */

    public function isFeatured()
    {
        return !! $this->is_featured;
    }

    public function hit()
    {
        return $this->increment('hits');
    }

    public function getRelatedProducts($items = 3)
    {
        return $this->whereHas('categories', function ($query) {
            $query->whereIn('id', $this->categories()->pluck('id'));
        })
            ->orderByRaw("RAND()")
            ->take($items)
            ->get();
    }

    public function setImageUrl($url)
    {
        return $this->update(['image_url' => $url]);
    }

    public function categorize($category)
    {
        if(!$this->categories->contains($category))
        {
            $this->categories()->attach($category);
        }
    }

    public function categorizeMany($categories)
    {
        foreach ($categories as $category) {
            $this->categorize($category);
        }
    }

    public function recategorize($categories)
    {
        $this->categories()->sync([]);
        $this->categorizeMany($categories);
    }

    public function categoriesList()
    {
        return $this->categories()->pluck('id')->toArray();
    }

    /*
     * Scopes
     */

    public function scopeFilter($query, $params)
    {
        $query->latest();

        if(isset($params['min_price'])){
            $this->scopeMinimumPrice($query, $params['min_price']);
        }

        if(isset($params['max_price'])){
            $this->scopeMaximumPrice($query, $params['max_price']);
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

    public static function scopeRecent($query)
    {
        return $query->latest();
    }

    public function scopePopular($query)
    {
        return $query->orderBy('hits', 'DESC');
    }

    public static function scopeCheap($query)
    {
        return $query->orderBy('current_price', 'ASC');
    }
}
