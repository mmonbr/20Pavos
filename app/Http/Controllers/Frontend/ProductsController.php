<?php

namespace App\Http\Controllers\Frontend;

use App\Events\ProductWasHit;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::filter($request->all())->paginate(21);

        return view('frontend.products.all', compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findBySlugOrIdOrFail($id);

        event(new ProductWasHit($product));

        return view('frontend.products.show', compact('product'));
    }
}
