<?php

namespace App\Traits;

trait SEO
{
    public function addSEOTagsForProduct($product)
    {
        \SEOMeta::setTitle($product->name);
        \SEOMeta::setDescription($product->description);

        \OpenGraph::setTitle($product->name);
        \OpenGraph::setDescription($product->description);
        \OpenGraph::setUrl(route('products.show', [$product->slug]));
        \OpenGraph::addImage(http_file($product->image_url));
        \OpenGraph::addProperty('image:width', '300');
        \OpenGraph::addProperty('image:height', '250');
    }


    public function addSEOTagsForCategory ($category)
    {
        \SEOMeta::setTitle($category->name);
        \SEOMeta::setDescription($category->description);

        \OpenGraph::setTitle($category->name);
        \OpenGraph::setDescription($category->description);
        \OpenGraph::setUrl(route('categories.show', [$category->slug]));
    }

    public function addSEOTagsForContact()
    {
        \SEOMeta::setTitle('Contacto');
        \SEOMeta::setDescription('Contacta con Derrochando.com');

        \OpenGraph::setTitle('Contacto');
        \OpenGraph::setDescription('Contacta con Derrochando.com');
        \OpenGraph::setUrl(route('contact.form'));
    }

    public function setCanonicalURL($url)
    {
        \SEOMeta::setCanonical($url);
    }
}
