<?php


namespace Makao\Collection;


use Makao\Card;
use Makao\Exception\CardNotFoundExpection;
use Makao\Exception\MethodNotAllowException;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;

class CardCollection implements \Countable, \Iterator, \ArrayAccess
{
    private Const FIRST_CARD_INDEX = 0;
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
        $pickedCard = $this->offsetGet(self::FIRST_CARD_INDEX);
        $this->offsetUnset(self::FIRST_CARD_INDEX);
        $this->cards = array_values($this->cards);
        return $pickedCard;
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
    public function rewind(): void
    {
        $this->position = self::FIRST_CARD_INDEX;
    }

    /**
     * @inheritdoc
     */
    public function offsetExists($offset): bool
    {
        return isset($this->cards[$offset]);
    }

    /**
     * @inheritdoc
     */
    public function offsetGet($offset): Card
    {
        return $this->cards[$offset];
    }

    /**
     * @inheritdoc
     * @throws MethodNotAllowException
     */
    public function offsetSet($offset, $value): Throws

    {
        throw new MethodNotAllowException('You can not add card to collection as array. Use addCard() method!');
    }

    /**
     * @inheritdoc
     */
    public function offsetUnset($offset)
    {
        unset($this->cards[$offset]);
    }
}