<?php


namespace Makao;



class Card
{
    private const VALUE_TWO = '2';
    private const VALUE_THREE = '3';
    private const VALUE_FOUR = '4';
    private const VALUE_FIVE = '5';
    private const VALUE_SIX = '6';
    private const VALUE_SEVEN = '7';
    private const VALUE_EIGHT = '8';
    private const VALUE_NINE = '9';
    private const VALUE_TEN = '10';
    private const VALUE_JACK = 'jack';
    private const VALUE_QUEEN = 'queen';
    private const VALUE_KING = 'king';
    private const VALUE_ACE = 'ACE';

    private const COLOR_DIAMOND = 'diamond';
    private const COLOR_SPADE = 'spade  ';
    private const COLOR_CLUB = 'club';
    private const COLOR_HEART = 'heart';

    private string $value;
    private string $color;


    public function __construct(string $value = 'test value', string $color = 'test value')
    {
        $this->value = $value;
        $this->color = $color;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }


    public static function values(): array
    {
        return [
             self::VALUE_TWO,
             self::VALUE_THREE,
             self::VALUE_FOUR,
             self::VALUE_FIVE,
             self::VALUE_SIX,
             self::VALUE_SEVEN,
             self::VALUE_EIGHT,
             self::VALUE_NINE,
             self::VALUE_TEN,
             self::VALUE_JACK,
             self::VALUE_QUEEN,
             self::VALUE_KING,
             self::VALUE_ACE,
        ];
    }

    public static function colors(): array
    {
        return [
            self::COLOR_DIAMOND,
            self::COLOR_SPADE,
            self::COLOR_CLUB,
            self::COLOR_HEART,
        ];
    }
}