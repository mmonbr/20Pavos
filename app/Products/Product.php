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
use App\Products\Providers\NullProvider;
use App\Products\Contracts\AffiliateProvider;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;

class Product extends Model implements SluggableInterface
{
    use Categorizable,
        Attachable,
        Scopable,
        DeleteFromS3,
        SluggableTrait,
        Eloquence,
        SoftDeletes;

    protected $providers = [
        'NullProvider' => NullProvider::class,
        'Standard'     => Standard::class,
        'Amazon'       => Amazon::class
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
        'build_from' => 'name',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $searchableColumns = ['name', 'description'];

    public static function boot()
    {
        parent::boot();

        self::deleting(function (Product $product) {
            if($product->forceDeleting)
                self::deleteS3File($product->image_path);
        });

        self::created(function (Product $product) {
            $product->addNullProvider();
            $product->unpublish();
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

    public function feature()
    {
        return $this->update(['featured', true]);
    }

    public function publish()
    {
        return $this->restore();

    }

    public function unpublish()
    {
        return $this->delete();
    }

    public function setImagePath($path)
    {
        return $this->update(['image_path' => $path]);
    }

    public function relatedProducts($items = 3)
    {
        return $this->whereHas('categories', function ($query) {
            $query->whereIn('id', $this->categories()->pluck('id'));
        })
            ->orderByRaw('RAND()')
            ->take($items)
            ->get();
    }

    public function provider()
    {
        return $this->morphTo('provider', 'providable_type', 'providable_id');
    }

    public function getProviderClass($provider)
    {
        return $this->providers[$provider];
    }

    public function addProvider(AffiliateProvider $provider)
    {
        if ($this->provider) {
            $this->provider()->delete();
        }

        return $provider->product()->save($this);
    }

    public function addProviderFromForm($data)
    {
        $providerClass = $this->getProviderClass($data['provider']);
        $provider = new $providerClass($data);
        $provider->save();

        $this->addProvider($provider);
    }

    public function addNullProvider()
    {
        $nullProvider = new NullProvider;
        $nullProvider->save();

        $this->addProvider($nullProvider);
    }
}
