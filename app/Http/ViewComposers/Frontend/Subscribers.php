<?php

namespace App\Http\ViewComposers\Frontend;

use Illuminate\View\View;
use App\Utilities\SubscribersCache;

class Subscribers
{
    protected $subscribersCache;

    public function __construct(SubscribersCache $subscribersCache)
    {
        $this->subscribersCache = $subscribersCache;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $subscribers = $this->subscribersCache->make();
        
        $view->with('subscribers_count', $subscribers['total']);
    }
}
