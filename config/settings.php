<?php

return [
    'emails' => [
        'contact' => 'derrochandoweb@gmail.com',
    ],

    'products' => [
        'results' => 14,
    ],

    'cache' => [
        'subscribers_time'  => '5',
        'subscribers_count' => 'subscribers_count',
    ],

    'files' => [
        'use_cdn' => false,
    ],

    'twitter' => [
        'via' => 'derrochando_com',
    ],

    'parsers' => [
        'amazon.es'    => App\Products\Parsers\AmazonEsParser::class,
        'curiosite.es' => App\Products\Parsers\CuriositeEsParser::class,
        'etsy.com'     => App\Products\Parsers\EtsyComParser::class,
    ]
];
