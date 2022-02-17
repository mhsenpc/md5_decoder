<?php

namespace App\Console\Commands;

use App\Jobs\WikipediaCrawlJob;
use Illuminate\Console\Command;

class WikipediaWordFinder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generator:wikipedia';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gathers word from wikipedia and put its hash on the database';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $url = 'https://en.wikipedia.org/wiki/Special:Random';
        $this->output->text('Crawling in wikipedia started!');
        WikipediaCrawlJob::dispatch($url);
        return 0;
    }
}
