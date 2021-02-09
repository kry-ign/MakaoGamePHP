<?php


namespace Tests\Makao\Service;


use Makao\Card;
use Makao\Collection\CardCollection;
use Makao\Service\CardService;
use Makao\Service\ShuffleService;
use PHPUnit\Framework\TestCase;


class CardServiceTest extends TestCase
{

    /**
     * @var CardService
     */
    private $cardServiceUnderTest;
    /**
     * @var ShuffleService|\PHPUnit\Framework\MockObject\MockObject
     */
    private $shuffleServiceMock;

    /**
     * @throws \ReflectionException
     */
    protected function setUp(): void
    {
        $this->shuffleServiceMock = $this->createMock(ShuffleService::class);
        $this->cardServiceUnderTest = new CardService($this->shuffleServiceMock);
    }

    public function testShouldAllowCreateNewCardCollection(){
        //expect

        //given

        //when
        $actual = $this->cardServiceUnderTest->createDeck();
        //then
        $this->assertInstanceOf(CardCollection::class, $actual);
        $this->assertCount(52, $actual);

        $i = 0;
        foreach(Card::values() as $value){
            foreach(Card::colors() as $color){
                $this->assertEquals($value, $actual[$i]->getValue());
                $this->assertEquals($color, $actual[$i]->getColor());
                ++$i;
            }
        }
    }
    public function testShouldShuffleCardsInCardCollection(){
        //expect

        //given
        $firstCard = new Card(Card::VALUE_EIGHT, Card::COLOR_DIAMOND);
        $secondCard = new Card(Card::VALUE_FIVE, Card::COLOR_CLUB);

        $this->shuffleServiceMock->expects($this->once())
            ->method('shuffle')
            ->willReturn([$secondCard, $firstCard]);

        $cardCollection = new CardCollection();
        $cardCollection
            ->add($firstCard)
            ->add($secondCard);
        //when
        $actual = $this->cardServiceUnderTest->shuffle($cardCollection);
        //then
        $this->assertSame($secondCard, $actual->pickCard());
        $this->assertSame($firstCard, $actual->pickCard());
    }
}