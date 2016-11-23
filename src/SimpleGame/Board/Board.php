<?php

namespace SimpleGame\Board;

use SimpleGame\Token\TokenInterface;
use SimpleGame\Token\WinningToken;

class Board implements BoardInterface
{
    /** @var [] */
    protected $board;

    /** @var int */
    protected $height;

    /** @var int */
    protected $width;

    /**
     * Fully quality class name
     * @var string
     */
    protected $tokenClass;

    public function __construct($tokenClass, $width, $height)
    {
        $this->tokenClass = $tokenClass;
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @param TokenInterface $token
     *
     * @return bool
     */
    public function checkIsWinningToken(TokenInterface $token)
    {
        if ($token instanceof WinningToken) {

            return true;
        }

        return false;
    }

    public function init()
    {
        $randomWidth = mt_rand(0, $this->width - 1);
        $randomHeight = mt_rand(0, $this->height - 1);

        for ($w = 0; $w < $this->width; $w++) {
            for ($h = 0; $h < $this->height; $h++) {
                $this->board[$w][$h] = new $this->tokenClass;
            }
        }
        $this->board[$randomWidth][$randomHeight] = new WinningToken();
    }

    public function getHeight()
    {

        return $this->height;
    }

    public function getWidth()
    {

        return $this->width;
    }

    /**
     * @param $width
     * @param $height

     * @return TokenInterface
     */
    public function getToken($width, $height)
    {

        return $this->board[$width][$height];
    }

    public function __toString()
    {
        $boardToString = '';
        foreach ($this->board as $boardLine) {
            foreach ($boardLine as $token) {
                /** @var TokenInterface $token */
                $boardToString .= sprintf('[%s]', $token->getSide() == TokenInterface::FACE_SIDE ? 'x' : 'O');
            }
            $boardToString .= "\n";
        }

        return $boardToString;
    }
}