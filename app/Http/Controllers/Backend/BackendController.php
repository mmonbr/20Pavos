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
    public function dashboard()
    {
        return view('backend.dashboard');
    }

    public function search(Request $request)
    {
        $query = $request->get('query');

        $products = Product::search($query)->get();
        $users = User::search($query)->get();

        return view('backend.search', compact('products', 'users'));
    }
}
