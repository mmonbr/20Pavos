<?php namespace App\Utilities;

use Carbon\Carbon;
use Spatie\Newsletter\MailChimp\Newsletter;
use Illuminate\Cache\Repository as CacheRepository;

class SubscribersCache {

    protected $newsletter;
    protected $cache;

    public function __construct(Newsletter $newsletter, CacheRepository $cache)
    {
        $this->newsletter = $newsletter;
        $this->cache = $cache;
    }

    public function make()
    {
        $expiresAt = Carbon::now()->addMinutes(config('settings.cache.subscribers_time'));

        return $this->cache->remember(config('settings.cache.subscribers_count'), $expiresAt, function () {
            return $this->newsletter->getApi()->lists->members(config('laravel-newsletter.mailChimp.lists.subscribers.id'));
        });
    }
}