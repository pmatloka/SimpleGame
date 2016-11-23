<?php

namespace SimpleGame\Board;

use SimpleGame\Token\TokenInterface;

interface BoardInterface
{
    public function init();

    /**
     * @param TokenInterface $token
     *
     * @return bool
     */
    public function checkIsWinningToken(TokenInterface $token);

    public function getHeight();

    public function getWidth();

    /**
     * @param int $width
     * @param int $height
     *
     * @return TokenInterface
     */
    public function getToken($width, $height);
}