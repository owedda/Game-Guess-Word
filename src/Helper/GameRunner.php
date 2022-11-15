<?php

declare(strict_types=1);

namespace App\Helper;

use App\Model\GameInterface;
use App\Model\Player;
use App\Model\PlayerInterface;
use App\Output\GameOutputInterface;

final class GameRunner
{
    private PlayerInterface $player1;
    private PlayerInterface $player2;

    public function __construct(
        private readonly GameInterface $game,
        private readonly BotPlayerHelperInterface $botPlayerHelper,
        private readonly GameOutputInterface $output
    ) {
        $this->player1 = new Player($this->game, 'Bot1');
        $this->player2 = new Player($this->game, 'Bot2');
    }

    public function start(): void
    {
        $this->output->printBlankStartingWord($this->game->getCurrentStateWord());

        while ($this->game->isFinished() === false) {
            $this->doPlayerMove($this->player1);

            if ($this->game->isFinished() === false) {
                $this->doPlayerMove($this->player2);
            }
        }

        $this->output->printGameEnd();
    }

    private function doPlayerMove(PlayerInterface $player): void
    {
        $guess = $this->botPlayerHelper->getRandomGuess();
        $guessLetterAttempt = $player->guessLetter($guess);
        $this->output->printPlayerGuessAttempt($player->getName(), $guess, $guessLetterAttempt);
    }
}
