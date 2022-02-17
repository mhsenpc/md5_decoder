<?php

namespace App\Services;

use App\Services\Contracts\CrawlerInterface;
use simplehtmldom\HtmlWeb;

abstract class CrawlerAbstract implements CrawlerInterface {
    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    protected $elementToFind;

    /**
     * @var string
     */
    protected $separator = ' ';

    /**
     * @var array
     */
    protected $toBeRemoved = [];

    protected $repository;

    /**
     * @param string $url
     */
    public function setUrl(string $url): void {
        $this->url = $url;
    }

    /**
     * @param mixed $repository
     */
    public function setRepository($repository): void {
        $this->repository = $repository;
    }

    public function __construct(string $url) {
        $this->url = $url;
    }

    public function crawl() {
        $doc = new HtmlWeb();
        $html = $doc->load($this->url);
        if ($html) {
            $repo = new $this->repository();
            $body = $html->find($this->elementToFind);

            // clean up
            foreach ($this->toBeRemoved as $item) {
                $body = str_replace($item, '', $body);
            }

            // extraction
            foreach ($body as $bodyItem) {
                $words = explode($this->separator, $bodyItem->plaintext);
                foreach ($words as $word) {
                    $repo->insert($word);
                }
            }

            // links inside the page
            foreach ($html->find('a') as $link) {
                $this->handlePageLinks($link->href);
            }
        }
    }

    protected function handlePageLinks(string $link) {
        // it can be implemented
    }
}
