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
            ['layouts.partials._header'], 'App\Http\ViewComposers\HeaderCategoriesComposer'
        );

        /*
         * Widgets - Top Products
         */
        view()->composer(
            'layouts.widgets.top', 'App\Http\ViewComposers\TopProductsWidgetComposer'
        );

        /*
         * Widgets - Search
         */
        view()->composer(
            'layouts.partials._search', 'App\Http\ViewComposers\SearchFormComposer'
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