<?php


namespace Tests\Makao\Collection;


use Makao\Card;
use Makao\Collection\CardCollection;
use PHPUnit\Framework\TestCase;

class CardCollectionTest extends TestCase
{
    /**
     * @var CardCollection
     */
    private CardCollection $cartCollection;

    protected function setUp(): void
    {
        $this->cartCollection = new CardCollection();
    }

    public function testShouldReturnZeroOnEmptyCollection(){
        //expect

        //given
        
        //when

        //then
        $this->assertCount(0,$this->cartCollection);
    }
    public function testShouldAddNewCardToCardCollection(){
        //expect

        //given
        $card = new Card();
        //when
        $this->cartCollection->add($card);
        //then
        $this->assertCount(1,$this->cartCollection);

    }
}