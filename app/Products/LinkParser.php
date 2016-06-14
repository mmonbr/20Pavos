<?php namespace App\Products;

use App\Products\Parsers\NullParser;

class LinkParser
{
    protected $link;

    public function __construct($link)
    {
        $this->link = $link;
        $this->parsers = collect(config('settings.parsers'));
    }

    public function getParserForHost($host)
    {
        $class = $this->parsers->first(function ($parser) use ($host) {
            return $host == $parser;
        }, NullParser::class);

        return new $class;
    }

    protected function getHostName()
    {
        return str_replace("www.", "", parse_url($this->link, PHP_URL_HOST));
    }

    public function getLink()
    {
        return $this->getParserForHost($this->getHostName())->build($this->link);
    }

    public function __toString()
    {
        return (string) $this->getLink();
    }
}