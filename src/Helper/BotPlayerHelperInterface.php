<?php

namespace App\Helper;

interface BotPlayerHelperInterface
{
    public function resetCharacters(): void;

    public function getRandomGuess(): string;
}
