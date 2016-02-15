<?php

namespace App\Http\ViewComposers\Frontend;

use App\Products\Category;
use Illuminate\View\View;

class HeaderCategories
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('categories', $this->category->tree());
    }
}
