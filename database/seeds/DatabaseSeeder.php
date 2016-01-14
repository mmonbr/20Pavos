<?php

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
        //Users
        $this->command->info('Users > Truncating');
        User::truncate();
        $this->command->info('Users > Creating sample users');
        $users = factory(User::class, 20)->create();

        //Products
        $this->command->info('Products > Truncating');
        Product::truncate();

        //Categories
        $this->command->info('Categories > Truncating');
        Category::truncate();
        \DB::table('categories_relations')->truncate();
        $this->command->info('Category > Creating sample categories');
        $categories = factory(Category::class, 10)->create()->each(function($category)
        {
            $this->command->info('Category > Filling category {' . $category->name . '} with products');
            $category->addItems(factory(Product::class, 50)->create());
        });
    }
}
