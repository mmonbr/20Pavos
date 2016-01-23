<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'username'       => $faker->userName,
        'email'          => $faker->email,
        'password'       => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {

    $asin_array = ['B005WU8WQW', 'B00TX5O8WE', 'B01427MW3O'];

    $images_array = [
        'uploads/products/3JvRxviHaHQMBoy1.jpg',
        //'http://www.thisiswhyimbroke.com/images/amazing-galaxy-lollipops-300x250.jpg',
        //'http://www.thisiswhyimbroke.com/images/rainbow-flower-plushies-300x250.jpg',
        //'http://www.thisiswhyimbroke.com/images/candle-chandelier-300x250.jpg',
        //'http://www.thisiswhyimbroke.com/images/remote-control-land-cruiser-300x250.jpg',
        //'http://www.thisiswhyimbroke.com/images/water-filtration-water-bottle-300x250.jpg',
        //'http://www.thisiswhyimbroke.com/images/steam-shower-300x250.jpg',
        //'http://www.thisiswhyimbroke.com/images/multi-color-led-earrings-300x250.jpg',
        //'http://www.thisiswhyimbroke.com/images/stravaganza-fire-pit-640x533.jpg',
        //'http://www.thisiswhyimbroke.com/images/ultra-strech-stain-resistant-denim-jeans-300x250.jpg',
        //'http://www.thisiswhyimbroke.com/images/solar-powered-bike-300x250.jpg',
        //'http://www.thisiswhyimbroke.com/images/picnic-organizer-300x250.jpg',
        //'http://www.thisiswhyimbroke.com/images/heart-rate-tracking-bracelet-300x250.jpg'
    ];

    return [
        'name'          => $faker->sentence,
        'description'   => $faker->sentences(5, true),
        'current_price' => $faker->randomNumber(2),
        'is_featured'   => $faker->boolean(),
        'hits'          => $faker->randomNumber(),
        'image_url'     => $images_array[array_rand($images_array)],
        'referral_link' => $faker->url,
        'ASIN'          => $asin_array[array_rand($asin_array)],
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name'        => $faker->words(3, true),
        'description' => $faker->sentence,
    ];
});
