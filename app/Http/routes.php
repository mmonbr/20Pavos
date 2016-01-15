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
});

Route::group(['prefix' => 'admin', 'middleware' => 'web', 'namespace' => 'Backend'], function () {
    #Dashboard
    Route::get('/', 'BackendController@dashboard')
        ->name('admin.index');
});
