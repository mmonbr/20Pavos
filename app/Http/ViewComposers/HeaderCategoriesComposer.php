<?php

namespace App\Http\ViewComposers;

use App\Category;
use Illuminate\View\View;

class HeaderCategoriesComposer
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