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
    private CardCollection $cardCollectionUnderTest;

    protected function setUp(): void
    {
        $this->cardCollectionUnderTest = new CardCollection();
    }

    public function testShouldReturnZeroOnEmptyCollection(){
        //expect

        //given
        
        //when

        //then
        $this->assertCount(0,$this->cardCollectionUnderTest);
    }
    public function testShouldAddNewCardToCardCollection(){
        //expect

        //given
        $card = new Card(Card::VALUE_EIGHT, Card::COLOR_DIAMOND);
        //when
        $this->cardCollectionUnderTest->add($card);
        //then
        $this->assertCount(1,$this->cardCollectionUnderTest);

    }
    public function testShouldAddNewCardsInChainToCardCollection(){
        //expect

        //given
        $firstCard = new Card(Card::VALUE_EIGHT, Card::COLOR_DIAMOND);
        $secondCard = new Card(Card::VALUE_NINE, Card::COLOR_CLUB);
        //when
        $this->cardCollectionUnderTest
            ->add($firstCard)
            ->add($secondCard);
        //then
        $this->assertCount(2,$this->cardCollectionUnderTest);
    }
    public function testShouldThrowCardNotFoundExpectionWhenITryPickCardFromEmptyCardCollection(){
        //expect
        $this->expectException(CardNotFoundExpection::class);
        $this->expectExceptionMessage('You can not pick card form empty CradCollection!');
        //given

        //when
        $this->cardCollectionUnderTest->pickCard();
        //then
    }
    public function testShouldIterableOnCardCollection(){
        //expect

        //given
        $card = new Card(Card::VALUE_EIGHT, Card::COLOR_DIAMOND);
        //when & then
        $this->cardCollectionUnderTest->add($card);

        $this->assertTrue($this->cardCollectionUnderTest->valid());
        $this->assertSame($card, $this->cardCollectionUnderTest->current());
        $this->assertSame(0, $this->cardCollectionUnderTest->key());

        $this->cardCollectionUnderTest->next();
        $this->assertFalse($this->cardCollectionUnderTest->valid());
        $this->assertSame(1, $this->cardCollectionUnderTest->key());

        $this->cardCollectionUnderTest->rewind();
        $this->assertTrue($this->cardCollectionUnderTest->valid());
        $this->assertSame($card, $this->cardCollectionUnderTest->current());
        $this->assertSame(0, $this->cardCollectionUnderTest->key());
    }
    public function testShouldGetFirstCardFromCardCollectionAndRomoveThisCardFromDeck(){
        //expect

        //given
        $firstCard = new Card(Card::VALUE_NINE, Card::COLOR_HEART);
        $secondCard = new Card(Card::VALUE_EIGHT, Card::COLOR_DIAMOND);
        $this->cardCollectionUnderTest
            ->add($firstCard)
            ->add($secondCard);
        //when
        $actual = $this->cardCollectionUnderTest->pickCard();
        //then
        $this->assertCount(1,$this->cardCollectionUnderTest);
        $this->assertSame($firstCard, $actual);
        $this->assertSame($secondCard, $this->cardCollectionUnderTest[0]);
    }
    public function testShouldThrowCardNotFoundExpectionWhenIPickdAllCardFromCardCollection(){
        //expect
        $this->expectException(CardNotFoundExpection::class);
        $this->expectExceptionMessage('You can not pick card form empty CradCollection!');
        //given
        $firstCard = new Card(Card::VALUE_EIGHT, Card::COLOR_DIAMOND);
        $secondCard = new Card(Card::VALUE_EIGHT, Card::COLOR_DIAMOND);
        $this->cardCollectionUnderTest
            ->add($firstCard)
            ->add($secondCard);
        //when
        $actual = $this->cardCollectionUnderTest->pickCard();
        $this->assertSame($firstCard, $actual);

        $actual = $this->cardCollectionUnderTest->pickCard();
        $this->assertSame($secondCard, $actual);

        $this->cardCollectionUnderTest->pickCard();
        //then
    }
    public function testShouldThrowMethodNotAllowExceptionWhenYouTryAddCardToCollectionAsArray(){
        //expect
        $this->expectException(MethodNotAllowException::class);
        $this->expectExceptionMessage('You can not add card to collection as array. Use addCard() method!');
        //given

        $card = new Card(Card::VALUE_EIGHT, Card::COLOR_DIAMOND);
        //when
        $this->cardCollectionUnderTest[] = $card;

        //then
    }
    public function testShouldReturnCollectionAsArray(){
        //expect

        //given
        $cards = [
            new Card(Card::VALUE_EIGHT, Card::COLOR_DIAMOND),
            new Card(Card::VALUE_EIGHT, Card::COLOR_DIAMOND)
        ];
        //when
        $actual = new CardCollection($cards);
        //then
        $this->assertEquals($cards, $actual->toArray());
    }

}