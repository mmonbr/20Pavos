<?php

use App\Products\LinkParser;

class LinkParserTest extends TestCase
{
    /** @test */
    public function test_a_a_link_is_untouched_if_no_parser_is_found()
    {
        $linkParser = new LinkParser('http://www.non-afiliate-link.com');

        $this->assertEquals(
            'http://www.non-afiliate-link.com',
            $linkParser->getLink()
        );
    }

    /** @test */
    public function test_a_a_parser_parses_amazon_es_links()
    {
        $linkParser = new LinkParser('https://www.amazon.es/gp/product/B01BVD3IT4');

        $this->assertEquals(
            'https://www.amazon.es/gp/product/B01BVD3IT4&tag=derrochand0cc-21',
            $linkParser->getLink()
        );
    }

    /** @test */
    public function test_a_parser_parses_curiosite_links()
    {
        $linkParser = new LinkParser('http://www.curiosite.es/producto/taza-existencialista-ya-no-eres-joven.html');

        $this->assertEquals(
            'http://track.webgains.com/click.html?wgcampaignid=190819&wgprogramid=2401&wgtarget=http://www.curiosite.es/producto/taza-existencialista-ya-no-eres-joven.html',
            $linkParser->getLink()
        );
    }

    /** @test */
    public function test_a_parser_parses_etsy_links()
    {
        $linkParser = new LinkParser('https://www.etsy.com/es/listing/233351778/replica-full-leather-or-cordura-deadpool');

        $this->assertEquals(
            'https://ad.zanox.com/ppc/?37234259C655268832&ulp=[[https://www.etsy.com/es/listing/233351778/replica-full-leather-or-cordura-deadpool]]',
            $linkParser->getLink()
        );
    }
}
