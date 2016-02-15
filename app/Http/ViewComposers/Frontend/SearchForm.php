<?php

namespace App\Http\ViewComposers\Frontend;

use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchForm
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('searchQuery', $this->request->get('query'));
    }
}
