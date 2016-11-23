<?php

namespace SimpleGame\Player;

use SimpleGame\Board\BoardInterface;

interface PlayerInterface
{
    public function move(BoardInterface $board, $width, $height);
}