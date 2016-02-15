<?php

namespace App\Products;

use Sofa\Eloquence\Eloquence;
use App\Products\Traits\Scopable;
use App\Products\Providers\Amazon;
use App\Products\Traits\Attachable;
use App\Products\Providers\Standard;
use App\Products\Traits\DeleteFromS3;
use App\Products\Traits\Categorizable;
use Illuminate\Database\Eloquent\Model;
use App\Products\Contracts\AffiliateProvider;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;

class Product extends Model implements SluggableInterface
{
    use Categorizable,
        Attachable,
        Scopable,
        DeleteFromS3,
        SluggableTrait,
        Eloquence;

    protected $providers = [
        'Standard' => Standard::class,
        'Amazon'   => Amazon::class
    ];

    protected $fillable = [
        'name',
        'slug',
        'type',
        'hits',
        'price',
        'featured',
        'video_url',
        'image_path',
        'description',
        'providable_id',
        'providable_type',
    ];

    protected $sluggable = [
        'build_from' => 'name'
    ];

    protected $searchableColumns = ['name', 'description'];

    public static function boot()
    {
        parent::boot();

        self::deleting(function ($product) {
            self::deleteS3File($product->image_path);
        });
    }

    public function hasVideo()
    {
        return !!$this->video_url;
    }

    public function hit()
    {
        return $this->increment('hits');
    }

    public function relatedProducts($items = 3)
    {
        return $this->whereHas('categories', function ($query) {
            $query->whereIn('id', $this->categories()->pluck('id'));
        })
            ->orderByRaw("RAND()")
            ->take($items)
            ->get();
    }

    public function provider()
    {
        return $this->morphTo('provider', 'providable_type', 'providable_id');
    }

    public function addProvider(AffiliateProvider $provider)
    {
        return $provider->product()->save($this);
    }
}
