<?php

namespace OnlinerBundle\Service;

use Buzz\Browser;
use Symfony\Component\DomCrawler\Crawler;

class Commenter
{
    /**
     * @var Browser $buzz
     */
    protected $buzz;

    public function __construct($buzz)
    {
        $this->buzz = $buzz;
    }

    protected $urls = [
        'people.onliner.by',
        'auto.onliner.by',
        'tech.onliner.by',
        'realt.onliner.by',
    ];

    public function runChecker()
    {
        foreach ($this->urls as $url) {
            $this->processUrl($url);
        }
    }

    private function processUrl($url)
    {
        $response = $this->buzz->get($url);
        $crawler = new Crawler($response->getContent());
        $crawler->filter('.news-tidings__link')->each(function() {

        });
    }
}