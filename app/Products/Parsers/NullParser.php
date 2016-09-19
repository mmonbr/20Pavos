<?php namespace App\Products\Parsers;

use App\Products\Contracts\LinkParser;

class NullParser implements LinkParser
{
    public function build($link)
    {
        return $link;
    }
}
