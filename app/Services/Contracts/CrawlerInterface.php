<?php

namespace App\Services\Contracts;

interface CrawlerInterface {
    public function __construct(string $url);
    public function crawl();
}
