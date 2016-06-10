<?php namespace App\Products\Parsers;

use App\Products\Contracts\LinkParser;

class CuriositeEsParser implements LinkParser
{
    public function build($link)
    {
        return "http://track.webgains.com/click.html?wgcampaignid=190819&wgprogramid=2401&wgtarget={$link}";
    }
}