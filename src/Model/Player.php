<?php

declare(strict_types=1);

namespace App\Model;

final class Player implements PlayerInterface
{
    public function __construct(private readonly GameInterface $game, private readonly string $name)
    {
    }

    public function guessLetter(string $letter): string
    {
        return $this->game->makeTurn($letter);
    }

    public function getName(): string
    {
        return $this->name;
    }
}
