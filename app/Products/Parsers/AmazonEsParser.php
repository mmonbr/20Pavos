<?php namespace App\Products\Parsers;

use App\Products\Contracts\LinkParser;

class AmazonEsParser implements LinkParser
{
    public function build($link)
    {
        return "{$link}?tag=derrochand0cc-21";
    }
}
