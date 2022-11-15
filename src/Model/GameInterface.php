<?php

namespace App\Model;

interface GameInterface
{
    public function makeTurn(string $letter): string;

    public function isFinished(): bool;
}
