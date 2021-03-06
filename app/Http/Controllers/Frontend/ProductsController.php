<?php

namespace App\Http\Controllers\Frontend;

use App\Traits\SEO;
use App\Products\Product;
use Illuminate\Http\Request;
use App\Events\ProductWasHit;
use App\Products\FilterProduct;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    use SEO;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::recent()->paginate(config('settings.products.results'));

        $this->addSEOTagsForHome();

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
     * Displays latest products.
     *
     * @return \Illuminate\Http\Response
     */
    public function latest()
    {
        $products = Product::recent()->paginate(config('settings.products.results'));

        $this->addSEOTagsForLatest();
        $this->setCanonicalURL(route('home'));

        return view('frontend.products.all', compact('products'));
    }

    /**
     * Displays popular products.
     *
     * @return \Illuminate\Http\Response
     */
    public function popular()
    {
        $products = Product::popular()->paginate(config('settings.products.results'));

        $this->addSEOTagsForPopular();
        $this->setCanonicalURL(route('home'));

        return view('frontend.products.all', compact('products'));
    }

    /**
     * Displays cheap products.
     *
     * @return \Illuminate\Http\Response
     */
    public function cheap()
    {
        $products = Product::cheap()->paginate(config('settings.products.results'));

        $this->addSEOTagsFoCheap();
        $this->setCanonicalURL(route('home'));

        return view('frontend.products.all', compact('products'));
    }

    /**
     * Gets a random product.
     *
     * @return \Illuminate\Http\Response
     */
    public function random()
    {
        $product = Product::random();

        $this->addSEOTagsForRandom($product);

        return view('frontend.products.show', compact('product'));
    }
}
