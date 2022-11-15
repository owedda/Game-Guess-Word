<?php

use App\Helper\BotPlayerHelper;
use App\Helper\GameRunner;
use App\Model\Game;
use App\Model\Player;
use App\Output\ConsoleGameOutput;

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

$game = new GameRunner(
    new Game("sultys", '*'),
    new BotPlayerHelper(1),
    new ConsoleGameOutput()
);

$game->start();

exit(1);
