<?php

namespace App\Listeners;

use App\Events\ProductWasHit;
use App\Services\HitProduct as HitProductService;

class HitProduct
{
    protected $hitProductService;

    /**
     * Create the event listener.
     *
     * @param HitProductService $hitProductService
     */
    public function __construct(HitProductService $hitProductService)
    {
        $this->hitProductService = $hitProductService;
    }

    /**
     * Handle the event.
     *
     * @param ProductWasHit $event
     */
    public function handle(ProductWasHit $event)
    {
        $this->hitProductService->hit($event->product);
    }
}
