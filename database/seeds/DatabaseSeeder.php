<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Product;

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
        $this->command->info('Products > Creating sample products');
        $products = factory(Product::class, 500)->create();
    }
}
