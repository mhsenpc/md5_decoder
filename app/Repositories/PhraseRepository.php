<?php


namespace App\Repositories;


use App\Models\Phrase;
use App\Services\HashGenerator;

class PhraseRepository {
    protected $hashGenerator;

    public function __construct() {
        $this->hashGenerator = new HashGenerator();
    }

    public function insert(string $phrase) {
        $hashItems = $this->hashGenerator->generate($phrase);
        $record = array_merge($hashItems, ['phrase' => $phrase]);
        return Phrase::query()->upsert($record,'phrase');
    }

    public function search(string $phrase, string $hashingAlgorithm): ?Phrase {
        return Phrase::query()->where($hashingAlgorithm, $phrase)->first();
    }
}
