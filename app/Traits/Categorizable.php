<?php namespace App\Traits;

use App\Category;
use Illuminate\Database\Eloquent\Model;

trait Categorizable
{
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable', 'categories_relations');
    }

    public function categoriesList()
    {
        return $this->categories()
            ->lists('name', 'id')
            ->toArray();
    }

    public function categorize($categories)
    {
        foreach ($categories as $category) {
            $this->addCategory($category);
        }
    }

    public function uncategorize($categories)
    {
        foreach ($categories as $category) {
            $this->removeCategory($category);
        }
    }

    public function recategorize($categories)
    {
        $this->categories()->sync([]);
        $this->categorize($categories);
    }

    public function addCategory(Model $category)
    {
        if (!$this->categories->contains($category->getKey())) {
            $this->categories()->attach($category);
        }
    }

    public function removeCategory(Model $category)
    {
        $this->categories()->detach($category);
    }

    public function getRelatedModels($items = 3)
    {
        return $this->whereHas('categories', function ($query) {
            $query->whereIn('id', $this->categories()->pluck('id'));
        })
            ->orderByRaw("RAND()")
            ->take($items)
            ->get();
    }
}