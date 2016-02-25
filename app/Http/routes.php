<?php

Route::group(['prefix' => 'auth', 'middleware' => 'web', 'namespace' => 'Auth'], function () {
    #Login Social
    Route::get('facebook', 'SocialAuthController@redirectToFacebook')
        ->name('auth.facebook');
    Route::get('facebook/callback', 'SocialAuthController@handleFacebookCallback')
        ->name('auth.facebook_callback');

    #Login
    Route::get('login', 'AuthController@showLoginForm')
        ->name('auth.form');
    Route::post('login', 'AuthController@login')
        ->name('auth.login');
    Route::get('logout', 'AuthController@logout')
        ->name('auth.logout');

    #Registro
    Route::get('register', 'AuthController@showRegistrationForm')
        ->name('auth.registration');
    Route::post('register', 'AuthController@postRegister')
        ->name('auth.register');

    #Recuperación Contraseña
    Route::get('password/reset/{token?}', 'PasswordController@showResetForm')
        ->name('password.token');
    Route::post('password/email', 'PasswordController@sendResetLinkEmail')
        ->name('password.email');
    Route::post('password/reset', 'PasswordController@reset')
        ->name('password.reset');
});

Route::group(['middleware' => 'web', 'namespace' => 'Frontend'], function () {
    #Nuevos Productos
    Route::get('/', 'ProductsController@index')
        ->name('home');

    #Nuevos Productos
    Route::get('/privacy', 'SectionsController@privacy')
        ->name('static.privacy');

    #Nuevos Productos
    Route::get('/cookies', 'SectionsController@cookies')
        ->name('static.cookies');

    #NContacto
    Route::get('/contacto', 'SectionsController@contact')
        ->name('contact.form');
    Route::post('/contacto', 'SectionsController@postContact')
        ->name('contact.send');

    #Productos
    Route::resource('productos', 'ProductsController', [
        'only'  => [
            'index',
            'show',
        ],
        'names' => [
            'all'  => 'products.all',
            'show' => 'products.show',
        ],
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

    #Producto Aleatorio
    Route::get('/random', 'ProductsController@random')
        ->name('products.random');

    #Categorías
    Route::resource('categorias', 'CategoriesController', [
        'only'  => [
            'index',
            'show',
        ],
        'names' => [
            'all'  => 'categories.all',
            'show' => 'categories.show',
        ],
    ]);

    #Buscador
    Route::get('buscar', 'SearchController@search')
        ->name('search');

    #Suscripciones
    Route::post('subscribe', 'SubscriptionsController@subscribe')
        ->name('newsletter.subscribe');

    #User Routes
    Route::resource('users', 'UsersController', [
        'except' => ['edit'],
    ]);

    Route::get('@{username}', 'UsersController@showByUsername')->name('users.show_username');
    Route::get('cuenta/editar', 'UsersController@edit')->name('users.edit');
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'namespace' => 'Backend'], function () {
    #Dashboard
    Route::get('/', 'BackendController@dashboard')
        ->name('admin.index');

    #Categorías
    Route::resource('categories', 'CategoriesController');
    Route::patch('categories/{id}/up', 'CategoriesController@moveUp')
        ->name('categories.up');
    Route::patch('categories/{id}/down', 'CategoriesController@moveDown')
        ->name('categories.down');
    Route::patch('categories/{id}/makeChildrenOf',
        'CategoriesController@makeChildrenOf')->name('categories.makeChildrenOf');

    #Productos
    Route::resource('products', 'ProductsController');

    Route::patch('products/{id}/publish', 'ProductsController@publish')
        ->name('admin.products.publish');
    Route::delete('products/{id}/unpublish', 'ProductsController@unpublish')
        ->name('admin.products.unpublish');

    Route::post('products/{id}/attachments', 'ProductsController@addAttachment')
        ->name('admin.products.attachments.store');
    Route::delete('products/{id}/attachments/{attachment_id}', 'ProductsController@removeAttachment')
        ->name('admin.products.attachments.delete');
    Route::post('products/{id}/attachments/{attachment_id}/up', 'ProductsController@moveAttachment')
        ->name('admin.products.attachments.move');
    Route::post('products/{id}/provider', 'ProductsController@setProvider')
        ->name('admin.products.provider.store');

    #Usuarios
    Route::resource('users', 'UsersController');

    #Search
    Route::post('search', 'BackendController@search')
        ->name('admin.search');
});