<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $products = Product::search($request->get('query'))->paginate(21);

        return view('products.all', compact('products'));
    }
}
