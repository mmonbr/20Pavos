<?php

namespace App\Http\ViewComposers\Frontend\Widgets;

use App\Products\Product;
use Illuminate\View\View;

class TopProducts
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('topProducts', $this->product->popular()->take(5)->get());
    }
}