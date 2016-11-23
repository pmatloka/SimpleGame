<?php

date_default_timezone_set('Europe/Warsaw');

require_once __DIR__ . '/../vendor/autoload.php';

use SimpleGame\Board\Board;
use SimpleGame\Game\Game;
use SimpleGame\Player\Player;
use SimpleGame\Timer\Timer;
use SimpleGame\Token\Token;

$game = new Game(
    new Board(Token::class, 5, 4),
    new Player(),
    5,
    new Timer(60, 'S')
);

$game->play();