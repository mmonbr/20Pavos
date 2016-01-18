<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

use App\User;
use App\Product;
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

        //Users
        //$this->command->info('Users > Truncating');
        //DB::table('users')->delete();
        $this->command->info('Users > Creating sample users');
        $users = factory(User::class, 10)->create();

        //Products
        //$this->command->info('Products > Truncating');
        //DB::table('products')->delete();

        //Categories
        //$this->command->info('Categories > Truncating');
        //DB::table('categories')->delete();
        //DB::table('category_product')->delete();
        $this->command->info('Category > Creating sample categories');
        $categories = factory(Category::class, 10)->create()->each(function($category)
        {
            $this->command->info('Category > Filling category {' . $category->name . '} with products');
            $category->addProducts(factory(Product::class, 50)->create());
        });
    }
}
