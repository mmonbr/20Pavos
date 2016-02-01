<?php namespace App\Traits;


trait SEO {
    public function addSEOTagsForProduct($product)
    {
        \SEOMeta::setTitle($product->name);
        \SEOMeta::setDescription($product->description);

        \OpenGraph::setTitle($product->name);
        \OpenGraph::setDescription($product->description);
        \OpenGraph::setUrl(route('products.show', [$product->slug]));
        \OpenGraph::addImage(cdn_file($product->attachments->first()->url));
    }

    public function setCanonicalURL($url)
    {
        \SEOMeta::setCanonical($url);
    }
}