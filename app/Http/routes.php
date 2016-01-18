<?php

Route::group(['middleware' => 'web', 'namespace' => 'Frontend'], function () {
    #Autenticación
    // Route::auth();

    #nicio
    Route::get('/', 'ProductsController@index')
        ->name('home');

    #Productos
    Route::resource('productos', 'ProductsController', [
        'only'  => [
            'index',
            'show'
        ],
        'names' => [
            'all'  => 'products.all',
            'show' => 'products.show'
        ]
    ]);

    #Categorías
    Route::resource('categorias', 'CategoriesController', [
        'only'  => [
            'index',
            'show'
        ],
        'names' => [
            'all'  => 'categories.all',
            'show' => 'categories.show'
        ]
    ]);

    #Buscador
    Route::get('buscar', 'SearchController@search')
        ->name('search');

    #Subscriptions
    Route::post('subscribe', 'SubscriptionsController@subscribe')
        ->name('newsletter.subscribe');

    Route::get('add', function () {
        /*$category = \App\Category::find(1);

        $category->children()->create([
           'name' => 'Subcat 1'
        ]);

        $category->children()->create([
            'name' => 'Subcat 2'
        ]);

        $category->children()->create([
            'name' => 'Subcat 3'
        ]);*/

        //dd(\App\Category::defaultOrder()->withDepth()->get()->linkNodes());
    });
});

Route::group(['prefix' => 'admin', 'middleware' => 'web', 'namespace' => 'Backend'], function () {
    #Dashboard
    Route::get('/', 'BackendController@dashboard')
        ->name('admin.index');
    #Categories
    Route::resource('categories', 'CategoriesController');
    Route::patch('categories/{id}/up', 'CategoriesController@moveUp')->name('categories.up');
    Route::patch('categories/{id}/down', 'CategoriesController@moveDown')->name('categories.down');
    Route::patch('categories/{id}/makeChildrenOf', 'CategoriesController@makeChildrenOf')->name('categories.makeChildrenOf');
    #Products
    Route::resource('products', 'ProductsController');
    #Users
    Route::resource('users', 'UsersController');
});
