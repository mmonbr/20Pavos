<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        /*
         * Products
         */
        'App\Events\ProductWasHit' => [
            'App\Listeners\HitProduct',
        ],

        /*
         * Newsletter
         */
        'App\Events\UserSubscribed' => [
            'App\Listeners\SubscribeUser',
        ],
        'App\Events\UserUnsubscribed' => [
            'App\Listeners\UnsubscribeUser',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);
    }
}
