<?php

return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'       => 'Derrochando.com',
            'description' => 'Los artículos más raros, curiosos y originales de Internet. ¿Estás buscando el regalo perfecto? Basta de compras aburridas, tenemos lo que necesitas.',
            'separator'   => ' - ',
            'keywords'    => [],
        ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Derrochando.com',
            'description' => 'Los artículos más raros, curiosos y originales de Internet. ¿Estás buscando el regalo perfecto? Basta de compras aburridas, tenemos lo que necesitas.',
            'url'         => 'https://derrochando.com',
            'type'        => false,
            'site_name'   => 'Derrochando.com',
            'images'      => [asset('img/derrochando.png')],
        ],
    ],
    'twitter'   => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'   => 'summary',
            'site'   => '@Derrochandoapp',
            'images' => [asset('img/derrochando.png')]
        ],
    ],
];
