<?php

Route::group(['middleware' => 'web', 'namespace' => 'Frontend'], function () {
    //Autenticación
    Route::auth();

    //Inicio
    Route::get('/', 'ProductsController@index')
        ->name('home');

    //Productos
    Route::resource('productos', 'ProductsController');

    //Categorías
    Route::resource('categorias', 'CategoriesController');

    //Buscador
    Route::get('buscar', 'SearchController@search')
        ->name('search');

    //Subscriptions
    Route::post('subscribe', 'SubscriptionsController@subscribe')
        ->name('newsletter.subscribe');
});
