<?php namespace App\Products\Parsers;

use App\Products\Contracts\LinkParser;

class EtsyComParser implements LinkParser
{
    public function build($link)
    {
        return "https://ad.zanox.com/ppc/?37234259C655268832&ulp=[[{$link}]]";
    }
}