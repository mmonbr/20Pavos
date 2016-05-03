<?php

namespace App\Http\Controllers\Backend;

use Cache;
use App\User;
use LaravelAnalytics;
use App\Products\Product;
use Illuminate\Http\Request;
use App\Utilities\SubscribersCache;
use App\Http\Controllers\Controller;

class BackendController extends Controller
{
    public function dashboard(SubscribersCache $subscribersCache)
    {
        $productsCount = Product::all()->count();
        $usersCount = User::all()->count();
        $subscribersCount = $subscribersCache->make();
        $visitors = LaravelAnalytics::getVisitorsAndPageViews(0)->first()['visitors'];
        $visitorsGraph = LaravelAnalytics::getVisitorsAndPageViews(90)->transform(function ($item) {
            return [
                'date'     => $item['date']->toDateString(),
                'visitors' => $item['visitors']
            ];
        })->pluck('visitors', 'date');

        return view('backend.dashboard',
            compact('productsCount', 'usersCount', 'subscribersCount', 'visitors', 'visitorsGraph'));
    }

    public function search(Request $request)
    {
        $query = $request->get('query');

        $products = Product::search($query)->get();
        $users = User::search($query)->get();

        return view('backend.search', compact('products', 'users'));
    }
}
