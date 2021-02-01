<?php


namespace Makao\Collection;


class CardCollection implements \Countable
{
    private array $cards = [];

    /**
     * @return int|void
     */
    public function count(): int
    {
        return count($this->cards);
    }

    public function add($card): void
    {
        $this->cards[] = $card;
    }
}