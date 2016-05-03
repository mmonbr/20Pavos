<?php

namespace App\Http\ViewComposers\Backend;

use Illuminate\View\View;
use App\Products\Category;

class CategoriesList
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
        $view->with('categories_list', $this->category->all()->toTree());
    }
}
