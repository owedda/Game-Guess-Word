<?php

namespace App\Output;

interface GameOutputInterface
{
    public function printBlankStartingWord(string $secretWord): void;

    public function printPlayerGuessAttempt(string $playerName, string $guess, string $secretWord): void;

    public function printGameEnd(): void;
}
