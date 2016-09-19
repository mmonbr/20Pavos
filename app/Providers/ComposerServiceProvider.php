<?php

namespace App\Providers;

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
         * FRONTEND
         */

        /*
         * Header Categories
         */
        view()->composer(
            ['frontend.layouts.partials._header'],
            'App\Http\ViewComposers\Frontend\HeaderCategories'
        );

        /*
        * Subscribers
        */
        view()->composer(
            ['frontend.layouts.partials._block'],
            'App\Http\ViewComposers\Frontend\Subscribers'
        );

        /*
         * FeaturedProducts
         */
        view()->composer(
            ['frontend.layouts.partials._block'],
            'App\Http\ViewComposers\Frontend\FeaturedProducts'
        );

        /*
         * Widgets - Top Products
         */
        view()->composer(
            'frontend.layouts.widgets.top',
            'App\Http\ViewComposers\Frontend\Widgets\TopProducts'
        );

        /*
         * Widgets - Search
         */
        view()->composer(
            'frontend.layouts.partials._search',
            'App\Http\ViewComposers\Frontend\SearchForm'
        );

        /*
         * BACKEND
         */
        view()->composer(
            [
                'backend.categories.index',
                'backend.categories.edit',
                'backend.categories.create',
                'backend.products.edit',
                'backend.products.create',
            ],
            'App\Http\ViewComposers\Backend\CategoriesList'
        );

        view()->composer(
            'backend.dashboard',
            'App\Http\ViewComposers\Backend\Dashboard'
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
