<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\Frontend\SearchRequest;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(SearchRequest $request)
    {
        $products = Product::search($request->get('query'))->paginate(config('settings.products.results'));

        return view('frontend.products.results', compact('products'));
    }
}
