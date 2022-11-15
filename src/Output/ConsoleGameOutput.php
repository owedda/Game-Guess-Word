<?php

declare(strict_types=1);

namespace App\Output;

final class ConsoleGameOutput implements GameOutputInterface
{
    public function printBlankStartingWord(string $secretWord): void
    {
        echo 'Starting word: ' . $secretWord . PHP_EOL;
    }

    public function printPlayerGuessAttempt(string $playerName, string $guess, string $secretWord): void
    {
        echo $playerName . ' Guess: ' . $guess . PHP_EOL;
        echo $secretWord . PHP_EOL;
        sleep(1);
    }

    public function printGameEnd(): void
    {
        echo "Game over";
    }
}
