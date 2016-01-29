<?php

namespace App;

use App\Traits\DeleteFromS3;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use DeleteFromS3;

    protected $fillable = [
        'path',
        'order',
        'product_id'
    ];

    public static function boot()
    {
        parent::boot();

        self::deleting(function ($attachment) {
            self::deleteS3File($attachment->path);
        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getUrlAttribute()
    {
        return cdn_file($this->path);
    }
}
