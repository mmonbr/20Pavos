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

$factory->define(App\Products\Product::class, function (Faker\Generator $faker) {

    $images_array = [
        'uploads/products/small.png'
    ];

    $description = 'Producto de prueba. La descripción tiene que tener 6 líneas. ¡Cómprate esto, cómprate esto! Huehuehue. Amazon, ETSY, eBay. Un poquitín más. Faltan dos líneas. Hola hola hola, :roto2:. Mesa pato cuádriceps césped azúcar caracola con patas. E ya.';

    return [
        'name'        => 'Producto de Prueba - ' . $faker->randomNumber(3),
        'description' => $description,
        'featured'    => $faker->boolean(1),
        'price'       => $faker->numberBetween(1, 200),
        'image_path'  => $images_array[array_rand($images_array)],
        'video_url'   => 'https://www.youtube.com/embed/8xe6nLVXEC0',
    ];
});


$factory->define(App\Products\Providers\Standard::class, function (Faker\Generator $faker) {
    return [
        'affiliate_link' => $faker->url,
    ];
});

$factory->define(App\Products\Providers\Amazon::class, function (Faker\Generator $faker) {
    return [
        'ASIN' => $faker->randomNumber(),
    ];
});

$factory->define(App\Products\Category::class, function (Faker\Generator $faker) {
    return [
        'name'        => $faker->name,
        'description' => $faker->sentence,
    ];
});
