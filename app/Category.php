<?php

namespace App;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Kalnoy\Nestedset\Node;

class Category extends Node implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = ['build_from' => 'name'];

    protected $fillable = ['name'];

    public function categorizable()
    {
        return $this->morphTo();
    }

    public function items($class)
    {
        return $this->morphedByMany($class, 'categorizable', 'categories_relations');
    }

    public function addItem($item)
    {
        return $this->items($this->getActualClassNameForMorph($item->getMorphClass()))->save($item);
    }

    public function addItems($items)
    {
        foreach ($items as $item) {
            $this->addItem($item);
        }
    }

    public static function tree()
    {
        return static::get()->toTree()->toArray();
    }
}
