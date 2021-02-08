<?php


namespace Tests\Makao\Collection;


use Makao\Card;
use Makao\Collection\CardCollection;
use Makao\Exception\CardNotFoundExpection;
use Makao\Exception\MethodNotAllowException;
use PHPUnit\Framework\TestCase;

class CardCollectionTest extends TestCase
{
    /**
     * @var CardCollection
     */
    private CardCollection $cardCollection;

    protected function setUp(): void
    {
        $this->cardCollection = new CardCollection();
    }

    public function testShouldReturnZeroOnEmptyCollection(){
        //expect

        //given
        
        //when

        //then
        $this->assertCount(0,$this->cardCollection);
    }
    public function testShouldAddNewCardToCardCollection(){
        //expect

        //given
        $card = new Card();
        //when
        $this->cardCollection->add($card);
        //then
        $this->assertCount(1,$this->cardCollection);

    }
    public function testShouldAddNewCardsInChainToCardCollection(){
        //expect

        //given
        $firstCard = new Card();
        $secondCard = new Card();
        //when
        $this->cardCollection
            ->add($firstCard)
            ->add($secondCard);
        //then
        $this->assertCount(2,$this->cardCollection);
    }
    public function testShouldThrowCardNotFoundExpectionWhenITryPickCardFromEmptyCardCollection(){
        //expect
        $this->expectException(CardNotFoundExpection::class);
        $this->expectExceptionMessage('You can not pick card form empty CradCollection!');
        //given

        //when
        $this->cardCollection->pickCard();
        //then
    }
    public function testShouldIterableOnCardCollection(){
        //expect

        //given
        $card = new Card();
        //when & then
        $this->cardCollection->add($card);

        $this->assertTrue($this->cardCollection->valid());
        $this->assertSame($card, $this->cardCollection->current());
        $this->assertSame(0, $this->cardCollection->key());

        $this->cardCollection->next();
        $this->assertFalse($this->cardCollection->valid());
        $this->assertSame(1, $this->cardCollection->key());

        $this->cardCollection->rewind();
        $this->assertTrue($this->cardCollection->valid());
        $this->assertSame($card, $this->cardCollection->current());
        $this->assertSame(0, $this->cardCollection->key());
    }
    public function testShouldGetFirstCardFromCardCollectionAndRomoveThisCardFromDeck(){
        //expect

        //given
        $firstCard = new Card();
        $secondCard = new Card();
        $this->cardCollection
            ->add($firstCard)
            ->add($secondCard);
        //when
        $actual = $this->cardCollection->pickCard();
        //then
        $this->assertCount(1,$this->cardCollection);
        $this->assertSame($firstCard, $actual);
        $this->assertSame($secondCard, $this->cardCollection[0]);
    }
    public function testShouldThrowCardNotFoundExpectionWhenIPickdAllCardFromCardCollection(){
        //expect
        $this->expectException(CardNotFoundExpection::class);
        $this->expectExceptionMessage('You can not pick card form empty CradCollection!');
        //given
        $firstCard = new Card();
        $secondCard = new Card();
        $this->cardCollection
            ->add($firstCard)
            ->add($secondCard);
        //when
        $actual = $this->cardCollection->pickCard();
        $this->assertSame($firstCard, $actual);

        $actual = $this->cardCollection->pickCard();
        $this->assertSame($secondCard, $actual);

        $this->cardCollection->pickCard();
        //then
    }
    public function testShouldThrowMethodNotAllowExceptionWhenYouTryAddCardToCollectionAsArray(){
        //expect
        $this->expectException(MethodNotAllowException::class);
        $this->expectExceptionMessage('You can not add card to collection as array. Use addCard() method!');
        //given

        $card = new Card();
        //when
        $this->cardCollection[] = $card;

        //then
    }
}