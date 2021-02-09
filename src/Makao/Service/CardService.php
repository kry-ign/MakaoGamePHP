<?php



namespace Makao\Service;


use Makao\Card;
use Makao\Collection\CardCollection;

class CardService
{

    public function createDeck(): CardCollection
    {
        $deck = new CardCollection();
        foreach(Card::values() as $value){
            foreach(Card::colors() as $color){
                $deck->add(new Card($value, $color));
            }
        }
        return $deck;
    }
}