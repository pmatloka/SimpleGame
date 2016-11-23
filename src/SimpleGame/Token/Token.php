<?php

namespace SimpleGame\Token;

class Token implements TokenInterface
{
    /** @var string */
    protected $side;

    public function __construct($side = TokenInterface::REVERSE_SIDE)
    {
        if (!in_array($side, [TokenInterface::FACE_SIDE, TokenInterface::REVERSE_SIDE])) {
            throw new \RuntimeException('Invalid token side');
        }
        $this->side = $side;
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
}