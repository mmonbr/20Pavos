<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Category;

class CategoryTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    public function test_a_category_can_be_created()
    {
        $category = factory(Category::class)->create([
            'name' => 'Test category',
        ]);

        $this->assertEquals('Test category', $category->name);
    }
}
