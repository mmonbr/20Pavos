<?php

namespace App\Products;

use Sofa\Eloquence\Eloquence;
use App\Products\Traits\Scopable;
use App\Products\Traits\Published;
use App\Products\Traits\Categorizable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;

class Product extends Model implements SluggableInterface, HasMedia
{
    use Categorizable,
        Scopable,
        SluggableTrait,
        Eloquence,
        HasMediaTrait,
        Published;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'hits',
        'link',
        'price',
        'provider',
        'video_url',
        'description',
        'providable_id',
        'providable_type',
    ];

    protected $sluggable = [
        'build_from' => 'name',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $searchableColumns = ['name', 'description'];

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
        $this->featured = true;
        $this->save();
    }

    public function publish()
    {
        $this->published = true;
        $this->save();
    }

    public function unpublish()
    {
        $this->published = false;
        $this->save();
    }

    public function published()
    {
        return !!$this->published;
    }

    public function getLinkAttribute($link)
    {
        return (new LinkParser($link))->getLink();
    }

    public function image()
    {
        return $this->getMedia('product_images')->first()->getUrl();
    }

    public function images()
    {
        return $this->getMedia('attachments');
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
}
