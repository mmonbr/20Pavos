<?php

namespace App\Http\ViewComposers\Backend;

use App\User;
use LaravelAnalytics;
use App\Products\Product;
use Illuminate\View\View;
use App\Utilities\SubscribersCache;

class Dashboard
{
    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('productsCount', $this->getProductsCount());
        $view->with('usersCount', $this->getUsersCount());
        $view->with('subscribersCount', $this->getSubscribersCount(app(SubscribersCache::class)));
        $view->with('visitors', $this->getUniqueVisitorsCount());
        $view->with('visitorsGraph', $this->getVisitorsGraph());
    }

    private function getProductsCount()
    {
        return Product::all()->count();
    }

    private function getUsersCount()
    {
        return User::all()->count();
    }

    private function getSubscribersCount(SubscribersCache $subscribersCache)
    {
        return $subscribersCache->make()['total'];
    }

    private function getUniqueVisitorsCount()
    {
        return LaravelAnalytics::getVisitorsAndPageViews(0)->first()['visitors'];
    }

    public function getVisitorsGraph()
    {
        return LaravelAnalytics::getVisitorsAndPageViews(90)->transform(function ($item) {
            return [
                'date'     => $item['date']->toDateString(),
                'visitors' => $item['visitors']
            ];
        })->pluck('visitors', 'date');
    }
}
