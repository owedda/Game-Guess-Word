<?php

declare(strict_types=1);

namespace App\Helper;

use App\Model\GameInterface;

final class BotPlayerHelper implements BotPlayerHelperInterface
{
    private string $characters;

    public function __construct(private readonly int $guessSize)
    {
        $this->resetCharacters();
    }

    public function resetCharacters(): void
    {
        $this->characters = 'abcdefghijklmnopqrstuvwxyz';
    }

    public function getRandomGuess(): string
    {
        $guess = $this->getRandomString();
        $this->characters = str_replace($guess, '', $this->characters);
        return $guess;
    }

    private function getRandomString(): string
    {
        $randomString = '';

        for ($i = 0; $i < $this->guessSize; $i++) {
            $index = rand(0, strlen($this->characters) - 1);
            $randomString .= $this->characters[$index];
        }

        return $randomString;
    }
}
