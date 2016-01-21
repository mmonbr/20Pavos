<?php

Route::group(['prefix' => 'auth', 'middleware' => 'web', 'namespace' => 'Auth'], function () {
    #Login Social
    Route::get('facebook', 'SocialAuthController@redirectToFacebook')
        ->name('auth.facebook');
    Route::get('facebook/callback', 'SocialAuthController@handleFacebookCallback')
        ->name('auth.facebook_callback');
});

Route::group(['middleware' => 'web', 'namespace' => 'Frontend'], function () {
    #Nuevos Productos
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

    #Nuevos Productos
    Route::get('/novedades', 'ProductsController@latest')
        ->name('products.latest');

    #Productos Populares
    Route::get('/populares', 'ProductsController@popular')
        ->name('products.popular');

    #Productos Baratos
    Route::get('/baratos', 'ProductsController@cheap')
        ->name('products.cheap');

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

    #Suscripciones
    Route::post('subscribe', 'SubscriptionsController@subscribe')
        ->name('newsletter.subscribe');
});

Route::group(['prefix' => 'admin', 'middleware' => 'web', 'namespace' => 'Backend'], function () {
    #Dashboard
    Route::get('/', 'BackendController@dashboard')
        ->name('admin.index');

    #Categorías
    Route::resource('categories', 'CategoriesController');
    Route::patch('categories/{id}/up', 'CategoriesController@moveUp')
        ->name('categories.up');
    Route::patch('categories/{id}/down', 'CategoriesController@moveDown')
        ->name('categories.down');
    Route::patch('categories/{id}/makeChildrenOf', 'CategoriesController@makeChildrenOf')->name('categories.makeChildrenOf');

    #Productos
    Route::resource('products', 'ProductsController');

    #Usuarios
    Route::resource('users', 'UsersController');
});
