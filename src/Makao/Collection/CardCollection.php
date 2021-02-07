<?php


namespace Makao\Collection;


use Makao\Card;
use Makao\Exception\CardNotFoundExpection;

class CardCollection implements \Countable, \Iterator
{
    private array $cards = [];
    private int $position = 0;

    /**
     * @return int|void
     */
    public function count(): int
    {
        return count($this->cards);
    }

    public function add($card): self
    {
        $this->cards[] = $card;

        return $this;
    }

    public function pickCard(): Card
    {
        if (empty($this->cards)){
            throw new CardNotFoundExpection('You can not pick card form empty CradCollection!');
        }
    }

    /**
     * @inheritdoc
     */
    public function valid(): bool
    {
        return isset($this->cards[$this->position]);
    }

    /**
     * @inheritdoc
     */
    public function current(): ?Card
    {
        return $this->cards[$this->position];
    }

    /**
     * @inheritdoc
     */
    public function next(): void
    {
        ++$this->position;
    }

    /**
     * @inheritdoc
     */
    public function key(): int
    {
        return $this->position;
    }

    /**
     * @inheritdoc
     */
    public function rewind()
    {
        // TODO: Implement rewind() method.
    }
}