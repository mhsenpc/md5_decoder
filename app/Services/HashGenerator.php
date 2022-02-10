<?php


namespace App\Services;


class HashGenerator {
    const HASING_ALGORITHMS = ['md5', 'sha1', 'sha256', 'sha512'];

    public function generate(string $word) :array{
        $hashedItems = [];
        foreach (self::HASING_ALGORITHMS as $hashingMethod) {
            $hashedItems[$hashingMethod] = hash($hashingMethod, $word);
        }
        return $hashedItems;
    }
}
