<?php

namespace App\Http\Livewire;

use App\Repositories\PhraseRepository;
use App\Services\HashGenerator;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class SearchPhrases extends Component {
    public $searchPhrase;
    public $decrypted;
    public $algorithm;
    public $message;

    public function render() {
        return view('livewire.search-phrases');
    }

    public function search() {
        $this->message = '';
        if ($this->searchPhrase) {
            $phraseRepository = new PhraseRepository();
            foreach (HashGenerator::HASING_ALGORITHMS as $algorithm) {
                $result = $phraseRepository->search($this->searchPhrase, $algorithm);

                if ($result ) {
                    Log::debug('result is');
                    Log::debug($result);
                    $this->decrypted = $result->phrase;
                    $this->algorithm = $algorithm;

                    return;
                }
            }

            $this->message = "Unfortunately We were unable to decrypt your hash!";
            $this->decrypted = $this->algorithm = "";
        }
    }
}
