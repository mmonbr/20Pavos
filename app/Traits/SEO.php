<?php

namespace App\Traits;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;

trait SEO
{
    public function addSEOTagsForHome()
    {
        $title = 'Los regalos más originales de Internet';

        SEOMeta::setTitle($title);
        OpenGraph::setTitle($title);
        TwitterCard::setTitle($title);
    }

    public function addSEOTagsForLatest()
    {
        $title = 'Los más nuevos';

        SEOMeta::setTitle($title);
        OpenGraph::setTitle($title);
        TwitterCard::setTitle($title);
    }

    public function addSEOTagsForPopular()
    {
        $title = 'Los más populares';

        SEOMeta::setTitle($title);
        OpenGraph::setTitle($title);
        TwitterCard::setTitle($title);
    }

    public function addSEOTagsFoCheap()
    {
        $title = 'Los más baratos';

        SEOMeta::setTitle($title);
        OpenGraph::setTitle($title);
        TwitterCard::setTitle($title);
    }

    public function addSEOTagsForRegister()
    {
        $title = 'Registro';

        SEOMeta::setTitle($title);
        OpenGraph::setTitle($title);
        TwitterCard::setTitle($title);
    }

    public function addSEOTagsForAuth()
    {
        $title = 'Login';

        SEOMeta::setTitle($title);
        OpenGraph::setTitle($title);
        TwitterCard::setTitle($title);
    }

    public function addSEOTagsForProduct($product)
    {
        $title = $product->name;
        $description = $product->description;
        $url = route('categories.show', [$product->slug]);
        $image = http_file($product->image_path);

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($description);
        OpenGraph::setUrl($url);

        OpenGraph::addImage($image);
        OpenGraph::addProperty('image:width', '300');
        OpenGraph::addProperty('image:height', '250');

        TwitterCard::setTitle($title);
        TwitterCard::setUrl($url);
        TwitterCard::setUrl($url);
        TwitterCard::addImage($image);
    }

    public function addSEOTagsForCategory($category)
    {
        $title = $category->name;
        $description = $category->description;
        $url = route('categories.show', [$category->slug]);

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($description);
        OpenGraph::setUrl($url);

        TwitterCard::setTitle($title);
        TwitterCard::setUrl($url);
    }

    public function addSEOTagsForContact()
    {
        $title = 'Contacto';
        $description = 'Contacta con Derrochando.com';
        $url = route('contact.form');

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($description);
        OpenGraph::setUrl($url);

        TwitterCard::setTitle($title);
        TwitterCard::setUrl($url);
    }

    public function addSEOTagsForRandom()
    {
        $title = 'Producto sorpresa';
        $description = '¿No te decides? Prueba nuestro buscador de regalos sorpresa tantas veces como quieras, tiene muy buen gusto.';
        $url = route('products.random');

        SEOMeta::setTitle($title);
        SEOMeta::setDescription($description);

        OpenGraph::setTitle($title);
        OpenGraph::setDescription($description);
        OpenGraph::setUrl($url);

        TwitterCard::setTitle($title);
        TwitterCard::setDescription($description);
        TwitterCard::setUrl($url);
    }

    public function setCanonicalURL($url)
    {
        SEOMeta::setCanonical($url);
    }
}
