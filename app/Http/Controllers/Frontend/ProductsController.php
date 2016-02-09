<?php

namespace App\Http\Controllers\Frontend;

use App\Events\ProductWasHit;
use App\Product;
use App\Traits\SEO;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    use SEO;

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::filter($request->all())->paginate(config('settings.products.results'));

        return view('frontend.products.all', compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findBySlugOrIdOrFail($id);

        $this->addSEOTagsForProduct($product);

        event(new ProductWasHit($product));

        return view('frontend.products.show', compact('product'));
    }

    /**
     * Displays latest products
     *
     * @return \Illuminate\Http\Response
     */
    public function latest()
    {
        $products = Product::recent()->paginate(config('settings.products.results'));

        $this->setCanonicalURL(route('home'));

        return view('frontend.products.all', compact('products'));
    }

    /**
     * Displays popular products
     *
     * @return \Illuminate\Http\Response
     */
    public function popular()
    {
        $products = Product::popular()->paginate(config('settings.products.results'));

        $this->setCanonicalURL(route('home'));

        return view('frontend.products.all', compact('products'));
    }

    /**
     * Displays cheap products
     *
     * @return \Illuminate\Http\Response
     */
    public function cheap()
    {
        $products = Product::cheap()->paginate(config('settings.products.results'));

        $this->setCanonicalURL(route('home'));

        return view('frontend.products.all', compact('products'));
    }

    /**
     * Gets a random product
     *
     * @return \Illuminate\Http\Response
     */
    public function random()
    {
        $product = Product::random();

        return view('frontend.products.show', compact('product'));
    }
}
