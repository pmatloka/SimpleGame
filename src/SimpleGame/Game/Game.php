<?php

namespace SimpleGame\Game;

use SimpleGame\Board\BoardInterface;
use SimpleGame\Output\Output;
use SimpleGame\Player\PlayerInterface;
use SimpleGame\Timer\TimerInterface;
use SimpleGame\Token\TokenInterface;

class Game
{
    /** @var BoardInterface */
    protected $board;

    /** @var int */
    protected $maxTry;

    /** @var PlayerInterface */
    protected $player;

    /** @var TimerInterface */
    protected $timer;

    /**
     * @param BoardInterface $board
     * @param PlayerInterface $player
     * @param int $maxTry
     * @param TimerInterface $timer
     */
    public function __construct(BoardInterface $board, PlayerInterface $player, $maxTry, TimerInterface $timer)
    {
        $this->board = $board;
        $this->maxTry = $maxTry;
        $this->player = $player;
        $this->timer = $timer;
    }

    public function play()
    {
        $this->board->init();

        Output::writeln('Game start');
        Output::writeln(sprintf('You have %s moves or %s', $this->maxTry, $this->timer->getGameTime()));
        Output::writeln('Write winning token position. For example: 1,2');
        Output::writeln(sprintf('Width should be between: %s and %s', 1, $this->board->getWidth()));
        Output::writeln(sprintf('Height should be between: %s and %s', 1, $this->board->getHeight()));
        Output::write($this->board);

        $this->timer->start();

        do {
            Output::writeln(sprintf('Player [%s] your moves', $this->player));
            $line = Output::readLine();

            if (!$this->validateReadLine($line)) {
                Output::writeln('Unrecognized command');
                continue;
            }

            $isWinner = $this->move($line);

            if ($isWinner) {
                Output::writeln(sprintf('Player [%s] you wins', $this->player));
                break;
            } else {
                Output::writeln(sprintf('Missing please try again'));
            }

            Output::write($this->board);

        } while($this->timer->checkTime() && $this->maxTry > 0);

        Output::writeln('Game over');
    }

    /**
     * @param string $line
     */
    protected function move($line)
    {
        $lineArr = explode(',', $line, 2);
        $this->maxTry--;

        return $this->player->move($this->board, $lineArr[0] - 1, $lineArr[1] - 1);
    }

    /**
     * @param string $line
     * @return bool
     */
    protected function validateReadLine($line)
    {
        //TODO should be changed for number greater than 9
        if (preg_match(sprintf('/^[1-%s],[1-%s]$/', $this->board->getWidth(), $this->board->getHeight()), $line)) {

            return true;
        }

        return false;
    }
}