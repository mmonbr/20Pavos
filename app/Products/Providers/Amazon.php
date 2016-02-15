<?php

namespace App\Products\Providers;

use Illuminate\Database\Eloquent\Model;
use App\Products\Traits\AffiliateProvider;
use App\Products\Contracts\AffiliateProvider as AffiliateInterface;

class Amazon extends Model implements AffiliateInterface
{
    use AffiliateProvider;

    protected $table = 'provider_amazon';

    protected $fillable = [
        'ASIN'
    ];

    public function link()
    {
        return "http://www.amazon.com/dp/{$this->ASIN}/?tag=derrochand0cc-21";
    }
}
