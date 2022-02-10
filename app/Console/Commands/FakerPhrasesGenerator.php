<?php

namespace App\Console\Commands;

use App\Models\Phrase;
use App\Repositories\PhraseRepository;
use Faker\Factory;
use Illuminate\Console\Command;

class FakerPhrasesGenerator extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generator:faker';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'generate words using faker library';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {
        $this->extractFakerWords();
        $this->extractFakerNames();
        $this->extractFakerComapnies();
        $this->extractFakerPasswords();
        $this->extractFakerUsernames();

        return 0;
    }

    protected function extractFakerWords(): void {
        for ($i = 0; $i < 1000; $i++) {
            $faker = Factory::create();
            $word = $faker->word;
            try {
                $repo = new PhraseRepository();
                $repo->insert($word);
            } catch (\Exception $exception) {

            } finally {
                $this->output->text("add $word");
            }
        }
    }

    protected function extractFakerNames(): void {
        for ($i = 0; $i < 1000; $i++) {
            $faker = Factory::create();
            $word = $faker->name;
            try {
                $repo = new PhraseRepository();
                $repo->insert($word);
            } catch (\Exception $exception) {

            } finally {
                $this->output->text("add $word");
            }
        }
    }

    protected function extractFakerComapnies(): void {
        for ($i = 0; $i < 1000; $i++) {
            $faker = Factory::create();
            $word = $faker->company;
            try {
                $repo = new PhraseRepository();
                $repo->insert($word);
            } catch (\Exception $exception) {

            } finally {
                $this->output->text("add $word");
            }
        }
    }

    protected function extractFakerPasswords(): void {
        for ($i = 0; $i < 1000; $i++) {
            $faker = Factory::create();
            $word = $faker->password;
            try {
                $repo = new PhraseRepository();
                $repo->insert($word);
            } catch (\Exception $exception) {

            } finally {
                $this->output->text("add $word");
            }
        }
    }

    protected function extractFakerUsernames(): void {
        for ($i = 0; $i < 1000; $i++) {
            $faker = Factory::create();
            $word = $faker->userName;
            try {
                $repo = new PhraseRepository();
                $repo->insert($word);
            } catch (\Exception $exception) {

            } finally {
                $this->output->text("add $word");
            }
        }
    }
}
