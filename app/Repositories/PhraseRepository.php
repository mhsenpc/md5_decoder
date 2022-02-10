<?php


namespace App\Repositories;


use App\Models\Phrase;
use App\Services\HashGenerator;
use Illuminate\Support\Facades\Log;

class PhraseRepository {
    protected $hashGenerator;

    public function __construct() {
        $this->hashGenerator = new HashGenerator();
    }

    public function insert(string $phrase) {
        $hashItems = $this->hashGenerator->generate($phrase);
        $record = array_merge($hashItems , ['phrase' => $phrase]);
        return Phrase::create($record);
    }

    public function search(string $phrase,string $hashingAlgorithm):?Phrase{
        Log::debug("find $phrase for hash $hashingAlgorithm");
        return Phrase::query()->where($hashingAlgorithm,$phrase )->first();
    }
}
