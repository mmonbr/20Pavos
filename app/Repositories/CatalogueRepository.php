<?php

use App\Product;
use App\Category;
use App\Attachment;

class CatalogueRepository
{

    protected $product;
    protected $category;
    protected $attachment;

    public function __construct(Product $product, Category $category, Attachment $attachment)
    {
        $this->product = $product;
        $this->category = $category;
        $this->attachment = $attachment;
    }

    public function getProductsByCategorySlug($slug)
    {
        $product = $this->category->findBySlugOrFail($slug);
    }

    public function getProductBySlug($slug)
    {
        $product = $this->product->findBySlugOrFail($slug);
    }

}