<?php


namespace Tests\Makao\Collection;


use Makao\Card;
use Makao\Collection\CardCollection;
use Makao\Exception\CardNotFoundExpection;
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
    public function testShouldAddNewCardsInChainToCardCollection(){
        //expect

        //given
        $firstCard = new Card();
        $secondCard = new Card();
        //when
        $this->cartCollection
            ->add($firstCard)
            ->add($secondCard);
        //then
        $this->assertCount(2,$this->cartCollection);
    }
    public function testShouldThrowCardNotFoundExpectionWhenITryPickCardFromEmptyCardCollection(){
        //expect
        $this->expectException(CardNotFoundExpection::class);
        $this->expectExceptionMessage('You can not pick card form empty CradCollection!');
        //given

        //when
        $this->cartCollection->pickCard();
        //then
    }
    public function testShouldIterableOnCardCollection(){
        //expect

        //given
        $card = new Card();
        //when & then
        $this->cartCollection->add($card);

        $this->assertTrue($this->cartCollection->valid());
        $this->assertSame($card, $this->cartCollection->current());
        $this->assertSame(0, $this->cartCollection->key());

        $this->cartCollection->next();
        $this->assertFalse($this->cartCollection->valid());
        $this->assertSame(1, $this->cartCollection->key());

        $this->cartCollection->rewind();
        $this->assertTrue($this->cartCollection->valid());
        $this->assertSame($card, $this->cartCollection->current());
        $this->assertSame(0, $this->cartCollection->key());
    }
}