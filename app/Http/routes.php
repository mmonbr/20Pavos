<?php

Route::group(['middleware' => 'web'], function () {
    //Autenticación
    Route::auth();

    //Inicio
    Route::get('/', ['as' => 'home', 'uses' => 'ProductsController@index']);

    //Productos
    Route::resource('productos', 'ProductsController');

    //Categorías
    Route::resource('categorias', 'CategoriesController');

    //Buscador
    Route::get('buscar', ['as' => 'search', 'uses' => 'SearchController@search']);

    //Subscriptions
    Route::post('subscribe', ['as' => 'newsletter.subscribe', 'uses' => 'SubscriptionsController@subscribe']);

    //Categories TEST
    Route::get('/test', function () {
        //$c = \App\Category::find(3);
        //$c->children()->create(['name' => 'Otro children 3']);

        $categories = \App\Category::all()->toTree();

        dd($categories);
    });
});
