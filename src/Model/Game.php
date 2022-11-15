<?php

declare(strict_types=1);

namespace App\Model;

final class Game implements GameInterface
{
    private State $state;
    private bool $isFinished;
    private string $unknownSymbol;

    public function __construct(string $word, string $unknownSymbol)
    {
        $this->isFinished = false;
        $this->unknownSymbol = $unknownSymbol;
        $this->state = new State($word, $unknownSymbol);
    }

    public function makeTurn(string $letter): string
    {
        $maskedWord = $this->state->getMaskedWord($letter);

        if (str_contains($maskedWord, $this->unknownSymbol) === false) {
            $this->isFinished = true;
        }

        return $maskedWord;
    }

    public function isFinished(): bool
    {
        return $this->isFinished;
    }

    public function getCurrentStateWord(): string
    {
        return $this->state->getMaskedWord();
    }
}
