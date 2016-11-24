<?php

namespace SimpleGame\Token;

class Token implements TokenInterface
{
    /** @var string */
    protected $side;

    /** @var bool */
    protected $isWinning;

    public function __construct($side = TokenInterface::REVERSE_SIDE, $isWinning = false)
    {
        if (!in_array($side, [TokenInterface::FACE_SIDE, TokenInterface::REVERSE_SIDE])) {
            throw new \RuntimeException('Invalid token side');
        }
        $this->side = $side;
        $this->isWinning = $isWinning;
    }

    /**
     * @return bool
     */
    public function checkTokenIsReversed()
    {

        return $this->side == TokenInterface::FACE_SIDE ? true : false;
    }

    /**
     * Changes token side so it is marked as faced
     */
    public function changeSide()
    {
        $this->side = TokenInterface::FACE_SIDE;
    }

    public function getSide()
    {

        return $this->side;
    }

    public function isWinning()
    {

        return $this->isWinning;
    }

    /**
     * @param bool $isWinning
     *
     * @return $this
     */
    public function setIsWinning($isWinning)
    {
        $this->isWinning = (bool) $isWinning;

        return $this;
    }
}