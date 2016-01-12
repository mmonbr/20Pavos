<?php

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', ['as' => 'home', 'uses' => 'ProductsController@index']);

    Route::resource('productos', 'ProductsController');
    Route::get('populares', ['as' => 'products.popular', 'uses' => 'HomeController@popular']);

    Route::resource('categorias', 'CategoriesController');

    //Buscador
    Route::get('buscar', ['as' => 'search', 'uses' => 'SearchController@search']);

    /*Route::get('amazon/{asin}', function ($asin) {
        $conf = new GenericConfiguration();
        $conf
            ->setCountry('es')
            ->setAccessKey('AKIAJTD5OUJLBJ6VF3AQ')
            ->setSecretKey('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')
            ->setRequest('\ApaiIO\Request\Soap\Request')
            ->setAssociateTag('derrochand0cc-21');

        $apaiIO = new ApaiIO($conf);
        $lookup = new Lookup();
        $lookup->setItemId('B00JKFGSE8');
        $lookup->setCondition('New');
        $lookup->setResponseGroup(array('Large'));

        // Change the ResponseTransformer to DOMDocument.
        $conf->setResponseTransformer('\ApaiIO\ResponseTransformer\ObjectToArray');
        $formattedResponse = $apaiIO->runOperation($lookup);

        return dd($formattedResponse);
    });*/
});
