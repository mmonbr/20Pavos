<?php

return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'       => 'Derrochando.com',
            'description' => 'En derrochando.com encontrarás los mejores productos de Internet. Se acabaron los regalos aburridos.',
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
            'description' => 'En derrochando.com encontrarás los mejores productos de Internet. Se acabaron los regalos aburridos.',
            'url'         => 'https://derrochando.com',
            'type'        => false,
            'site_name'   => 'Derrochando.com',
            'images'      => [],
        ],
    ],
    'twitter'   => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card' => 'summary',
            'site' => '@Derrochandoapp',
        ],
    ],
];
