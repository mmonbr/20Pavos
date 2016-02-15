<?php

namespace App\Products\Providers;

use Illuminate\Database\Eloquent\Model;
use App\Products\Traits\AffiliateProvider;
use App\Products\Contracts\AffiliateProvider as AffiliateInterface;

class Standard extends Model implements AffiliateInterface
{
    use AffiliateProvider;

    protected $table = 'provider_standard';

    protected $fillable = [
        'affiliate_link',
    ];

    public function link()
    {
        return $this->affiliate_link;
    }
}
