<?php

namespace App\Products\Providers;

use Illuminate\Database\Eloquent\Model;
use App\Products\Traits\AffiliateProvider;
use App\Products\Contracts\AffiliateProvider as AffiliateInterface;

class Amazon extends Model implements AffiliateInterface
{
    use AffiliateProvider;

    protected static $providerName = 'amazon';
    protected $table = 'provider_amazon';

    protected $fillable = [
        'ASIN',
    ];

    public function link()
    {
        return "http://www.amazon.es/dp/{$this->ASIN}/?tag=derrochand0cc-21";
    }

    public function name()
    {
        return static::$providerName;
    }
}
