<?php

namespace SimpleGame\Player;

use SimpleGame\Board\BoardInterface;

class Player implements PlayerInterface
{
    /** @var string */
    protected $name;

    public function __construct($name = 'Anonymous')
    {
        $this->name = $name;
    }

    /**
     * @param BoardInterface $board
     * @param int $width
     * @param int $height
     *
     * @return bool
     */
    public function move(BoardInterface $board, $width, $height)
    {
        $token = $board->getToken($width, $height);
        if ($token->checkTokenIsReversed()) {

            return false;
        }

        $token->changeSide();

        return $board->checkIsWinningToken($token);
    }

    public function __toString()
    {

        return $this->name;
    }
}