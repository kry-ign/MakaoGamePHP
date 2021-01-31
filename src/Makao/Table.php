<?php


namespace Makao;

use Makao\Exception\TooManyPlayerAddTheTableException;

class Table
{
    private const MAX_PlAYERS = 4;
    private $players = [];

    public function countPlayers(): int
    {
        return count($this->players);
    }

    public function addPlayer(Player $player): void
    {
        if ($this->countPlayers() === self::MAX_PlAYERS) {
            throw new TooManyPlayerAddTheTableException(self::MAX_PlAYERS);
        }
        $this->players[] = $player;
    }
}