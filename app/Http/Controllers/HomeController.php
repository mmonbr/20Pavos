<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function popular()
    {
        $products = Product::popular();

        return view('products.all', compact('products'));
    }
}
