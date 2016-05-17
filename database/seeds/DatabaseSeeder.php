<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('migrate:refresh');

        $this->command->info('Users > Creating sample users');
        $users = factory(User::class, 10)->create();

        $this->command->info('Category > Creating sample categories');

        $categories = factory(App\Products\Category::class, 10)->create()->each(function ($category) {
            $category->addProducts(factory(App\Products\Product::class, 10)->create()->each(function ($product) {
                $product->addAttachment('uploads/products/big.png');
                $product->publish();
            }));

            $category->addProducts(factory(App\Products\Product::class, 10)->create()->each(function ($product) {
                $product->addAttachment('uploads/products/big.png');
                $product->publish();
            }));
        });
    }
}
