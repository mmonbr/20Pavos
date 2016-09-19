<?php

namespace App\Providers;

use App\Events\ProductWasHit;
use App\Events\UserSubscribed;
use App\Events\UserUnsubscribed;
use App\Listeners\HitProduct;
use App\Listeners\SubscribeUser;
use App\Listeners\UnsubscribeUser;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        ProductWasHit::class    => [HitProduct::class],
        UserSubscribed::class   => [SubscribeUser::class],
        UserUnsubscribed::class => [UnsubscribeUser::class]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
