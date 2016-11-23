<?php

namespace SimpleGame\Timer;

class Timer implements TimerInterface
{
    /** @var \DateInterval */
    protected $dateInterval;

    protected $startTime;

    protected $intervalTime;

    protected $intervalUnit;

    public function __construct($intervalTime, $intervalUnit)
    {
        $this->intervalTime = $intervalTime;
        $this->intervalUnit = $intervalUnit;
        $this->dateInterval = new \DateInterval(sprintf('PT%s%s', $intervalTime, $intervalUnit));
    }

    public function checkTime()
    {
        if ($this->startTime > new \DateTime()) {

            return true;
        }

        return false;
    }

    public function getGameTime()
    {

        return $this->intervalTime . $this->intervalUnit;
    }

    public function start()
    {
        $this->startTime = new \DateTime();
        $this->startTime->add($this->dateInterval);
    }
}