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
        'uploads/products/small.png'
    ];

    $description = 'Producto de prueba. La descripción tiene que tener 6 líneas. ¡Cómprate esto, cómprate esto! Huehuehue. Amazon, ETSY, eBay. Un poquitín más. Faltan dos líneas. Hola hola hola, :roto2:. Mesa pato cuádriceps césped azúcar caracola con patas. E ya.';

    return [
        'name'          => 'Producto de Prueba - ' . $faker->randomNumber(3),
        'description'   => $description,
        'current_price' => $faker->randomNumber(2),
        'is_featured'   => $faker->boolean(),
        'hits'          => $faker->randomNumber(),
        'image_path'    => $images_array[array_rand($images_array)],
        'video_url'     => 'https://www.youtube.com/watch?v=6zWuWsby8K0',
        'referral_link' => $faker->url,
        'ASIN'          => $asin_array[array_rand($asin_array)],
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name'        => $faker->name,
        'description' => $faker->sentence,
    ];
});
