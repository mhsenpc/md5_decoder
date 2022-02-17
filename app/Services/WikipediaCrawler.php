<?php

namespace App\Services;

use App\Jobs\WikipediaCrawlJob;
use App\Repositories\PhraseRepository;
use Illuminate\Support\Str;

class WikipediaCrawler extends CrawlerAbstract {

    protected $elementToFind = '#bodyContent';

    protected $repository = PhraseRepository::class;

    protected $toBeRemoved = ["\n"];

    protected function handlePageLinks(string $link){
        if (Str::of($link)->startsWith('/wiki/')) {
            $fullLink = 'https://en.wikipedia.org' . $link;
            WikipediaCrawlJob::dispatch($fullLink);
        }
    }
}
