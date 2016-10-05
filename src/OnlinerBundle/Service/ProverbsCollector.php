<?php

namespace OnlinerBundle\Service;

use Buzz\Browser;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\HttpFoundation\Response;

class ProverbsCollector
{
    /**
     * @var Browser $buzz
     */
    protected $buzz;

    /**
     * ProverbsCollector constructor.
     *
     * @param $buzz
     */
    public function __construct($buzz)
    {
        $this->buzz = $buzz;
    }

    public function collectConfuci()
    {
        $n = 1;
        $contentExists = true;
        $startUrl = "http://quote-citation.com/author/confucius/page/%s";
        while ($contentExists) {
            /** @var Response $response */
            $response = $this->buzz->get(sprintf($startUrl, $n));
            $statusCode = $response->getStatusCode();
            if ($statusCode != Response::HTTP_OK) {
                $contentExists = false;
                continue;
            }

            $crawler = new Crawler($response->getContent());
            $crawler->filter('#content .quote')->each(function(Crawler $el) {
                $text = $el->filter('.quote-text-inner')->text();
            });

            $n++;
        }
    }
}
