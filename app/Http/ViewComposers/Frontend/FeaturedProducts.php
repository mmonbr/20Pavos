<?php

namespace App\Http\ViewComposers\Frontend;

use App\Products\Product;
use Illuminate\View\View;

class FeaturedProducts
{
    protected $featured;

    public function __construct(Product $featured)
    {
        $this->featured = $featured;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('featuredProducts', $this->featured->featured()->get());
    }
}