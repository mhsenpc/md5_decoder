<div>
    <div class="row">
        <div class="col-md-12">
            <h3>
                How it works?
            </h3>
            <p>
                MD5 is a 128-bit encryption algorithm, which generates a hexadecimal hash of 32 characters, regardless
                of the input word size.
            </p>
            <p>This algorithm is not reversible, it's normally impossible to find the original word from the MD5.</p>
            <p>Our tool uses a huge database in order to have the best chance of cracking the original word.</p>
            <p>Just enter the hash in the MD5 decoder in the form above to try to decrypt it!</p>

            <h4>Does it only supports MD5?</h4>
            <p>
                Not only this tool supports MD5 hashing algorithm but also supports sha1, sha256 and sha512 hashing
                algorithms.
            </p>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-3">
            <h6>
                Enter your hash here
            </h6>
        </div>
        <div class="col-6">
            <input type="text" class="form-text" wire:model.lazy="searchPhrase"/>
            <button type="button" class="btn btn-success" wire:click="search">
                Decrypt
            </button>
        </div>

        <div wire:loading wire:target="search">
            Decrypting...
        </div>

        @if(!empty($decrypted))
            <div class="row">
                <div class="col-md-12">
                    <h2>Congratulations!</h2>
                    <h4>We could find your hash</h4>
                    Decrypted text is <span class="result">{{$decrypted}}</span> which was encrypted by <span class="algorithm">{{$algorithm}}</span> Algorithm
                </div>
            </div>
        @endif

        @isset($message)
            <p>{{$message}}</p>
        @endisset

    </div>
</div>
