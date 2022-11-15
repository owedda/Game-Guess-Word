<?php

namespace App\Model;

interface PlayerInterface
{
    public function guessLetter(string $letter): string;

    public function getName(): string;
}
