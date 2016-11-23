<?php

namespace SimpleGame\Timer;

interface TimerInterface
{
    public function start();

    public function checkTime();

    public function getGameTime();
}