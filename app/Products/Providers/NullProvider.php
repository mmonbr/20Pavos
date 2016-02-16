<?php

namespace App\Products\Providers;

use Illuminate\Database\Eloquent\Model;
use App\Products\Traits\AffiliateProvider;
use App\Products\Contracts\AffiliateProvider as AffiliateInterface;

class NullProvider extends Model implements AffiliateInterface
{
    use AffiliateProvider;

    protected static $providerName = 'null_provider';
    protected $table = 'provider_null';

    public function link()
    {
        return null;
    }

    public function name()
    {
        return static::$providerName;
    }
}
