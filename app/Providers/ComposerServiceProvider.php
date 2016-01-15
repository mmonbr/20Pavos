<?php

namespace App\Providers;

use App\Http\Requests\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Header Categories
         */
        view()->composer(
            ['frontend.layouts.partials._header'], 'App\Http\ViewComposers\Frontend\HeaderCategories'
        );

        /*
         * Widgets - Top Products
         */
        view()->composer(
            'frontend.layouts.widgets.top', 'App\Http\ViewComposers\Frontend\Widgets\TopProducts'
        );

        /*
         * Widgets - Search
         */
        view()->composer(
            'frontend.layouts.partials._search', 'App\Http\ViewComposers\Frontend\SearchForm'
        );

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}