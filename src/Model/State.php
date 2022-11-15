<?php

declare(strict_types=1);

namespace App\Model;

final class State
{
    private string $secret;
    private array $maskedWord;
    private int $wordLength;
    private string $unknownSymbol;

    public function __construct(string $secretWord, string $unknownSymbol)
    {
        $this->secret = $secretWord;
        $this->unknownSymbol = $unknownSymbol;
        $this->wordLength = strlen($secretWord);
        $this->setMaskedWord();
    }

    public function getMaskedWord(string $letter = null): string
    {
        if (is_null($letter) === true) {
            return implode($this->maskedWord);
        }
        $this->guessLetter($letter);
        return implode($this->maskedWord);
    }

    private function guessLetter(string $letter): void
    {
        for ($i = 0; $i < $this->wordLength; $i++) {
            if ($this->secret[$i] === $letter) {
                $this->maskedWord[$i] = $this->secret[$i];
            }
        }
    }

    private function setMaskedWord(): void
    {
        for ($i = 0; $i < $this->wordLength; $i++) {
            $this->maskedWord[$i] = $this->unknownSymbol;
        }
    }
}
