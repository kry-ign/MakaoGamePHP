<?php


namespace Tests\Makao\Service;


use Makao\Card;
use Makao\Collection\CardCollection;
use Makao\Service\CardService;
use PHPUnit\Framework\TestCase;


class CardServiceTest extends TestCase
{
    public function testShouldAllowCreateNewCardCollection(){
        //expect

        //given
        $cardService = new CardService();
        //when
        $actual = $cardService->createDeck();
        //then
        $this->assertInstanceOf(CardCollection::class, $actual);
        $this->assertCount(52, $actual);

        $i = 0;
        foreach(Card::values() as $value){
            foreach(Card::colors() as $color){
                $this->assertEquals($value, $actual[$i]->getVaule());
                $this->assertEquals($color, $actual[$i]->getColor());
                ++$i;
            }
        }
    }
}