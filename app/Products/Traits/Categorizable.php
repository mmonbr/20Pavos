<?php

namespace App\Products\Traits;

use App\Products\Category;

trait Categorizable
{
    /**
     * @return mixed
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Attaches product to any given category.
     *
     * @param $category
     */
    public function categorize($category)
    {
        if (! $this->categories->contains($category)) {
            $this->categories()->attach($category);
        }
    }

    /**
     * Attaches product to many categories at once.
     *
     * @param $categories
     */
    public function categorizeMany($categories)
    {
        foreach ($categories as $category) {
            $this->categorize($category);
        }
    }

    /**
     * Removes product from all categories and add
     * new ones.
     *
     * @param $categories
     */
    public function recategorize($categories)
    {
        $this->categories()->sync([]);
        $this->categorizeMany($categories);
    }

    /**
     * Returns an array of product categories.
     *
     * @return mixed
     */
    public function categoriesList()
    {
        return $this->categories()->pluck('id')->toArray();
    }
}
