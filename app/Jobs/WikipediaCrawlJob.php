<?php

namespace App\Jobs;

use App\Services\WikipediaCrawler;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class WikipediaCrawlJob implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    private $url;

    /**
     * Create a new job instance.
     *
     * @param string $url
     * @return void
     */
    public function __construct(string $url) {
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        $service = new WikipediaCrawler($this->url);
        $service->crawl();
    }
}
