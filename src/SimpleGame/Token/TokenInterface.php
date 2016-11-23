<?php

namespace SimpleGame\Token;

interface TokenInterface
{
    const FACE_SIDE = 'face';
    const REVERSE_SIDE = 'reverse';

    public function checkTokenIsReversed();
    
    public function changeSide();

    public function getSide();
}