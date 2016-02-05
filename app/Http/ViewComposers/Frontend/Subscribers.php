<?php

namespace App\Http\ViewComposers\Frontend;

use Carbon\Carbon;
use Illuminate\View\View;
use Spatie\Newsletter\MailChimp\Newsletter;
use Illuminate\Cache\Repository as CacheRepository;

class Subscribers
{
    protected $newsletter;
    protected $cache;

    public function __construct(Newsletter $newsletter, CacheRepository $cache)
    {
        $this->newsletter = $newsletter;
        $this->cache = $cache;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $expiresAt = Carbon::now()->addHours(1);

        $subscribers = $this->cache->remember(config('settings.cache.subscribers_count'), $expiresAt, function () {
            return $this->newsletter->getApi()->lists->members(config('laravel-newsletter.mailChimp.lists.subscribers.id'));
        });

        $view->with('subscribers_count', $subscribers['total']);
    }
}