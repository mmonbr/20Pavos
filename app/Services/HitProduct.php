<?php namespace App\Services;

use App\Product;
use Carbon\Carbon;
use Illuminate\Cache\Repository as CacheRepository;
use Illuminate\Http\Request;

class HitProduct
{
    protected $cache;
    protected $request;

    public function __construct(CacheRepository $cache, Request $request)
    {
        $this->cache = $cache;
        $this->request = $request;
    }

    public function hit(Product $product)
    {
        $expiresAt = Carbon::now()->addHours(24);

        $this->cache->remember($this->getCacheKey($product), $expiresAt, function() use ($product) {
            $product->hit();

            return $this->getCacheKey($product);
        });
    }

    private function getCacheKey($product)
    {
        return md5($product->id . ':' . $this->request->ip());
    }
}