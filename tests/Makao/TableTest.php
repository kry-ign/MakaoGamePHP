<?php


namespace tests\Makao;


use Makao\Exception\TooManyPlayerAddTheTableException;
use Makao\Player;
use Makao\Table;
use PHPUnit\Framework\TestCase;

class TableTest extends TestCase
{
    /**
     * @var Table
     */
    private Table $tableUnderTest;

    public function setUp(): void
    {
        $this->tableUnderTest = new Table();
    }

    public function testShouldCreateEmptyTable() {
        //Expect


        //Given


        //When
        $actual = $this->tableUnderTest->countPlayers();

        //Then
        $this->assertSame(0,$actual);
    }
    public function testShouldAddOnePLayerToTable() {
        //Expect

        //Given
        $expected = 1;
        $player = new Player();
        //When
        $this->tableUnderTest->addPlayer($player);
        $actual = $this->tableUnderTest->countPlayers();
        //Then
        $this->assertSame($expected,$actual);
    }
    public function testShouldReturnCountWhenIAdManyPlayers() {
        //Expect

        //Given
        $expected = 2;
        //When
        $this->tableUnderTest->addPlayer(new Player());
        $this->tableUnderTest->addPlayer(new Player());
        $actual = $this->tableUnderTest->countPlayers();
        //Then
        $this->assertSame($expected,$actual);
    }
    public function testShouldThrowTooManyPlayerAddTheTableExceptionWhenITryAddMoreThanFourPlayers() {
        //Expect
        $this->expectException(TooManyPlayerAddTheTableException::class);
        $this->expectErrorMessage('Max capacity is 4 players!');
        //Given

        //When
        $this->tableUnderTest->addPlayer(new Player());
        $this->tableUnderTest->addPlayer(new Player());
        $this->tableUnderTest->addPlayer(new Player());
        $this->tableUnderTest->addPlayer(new Player());
        $this->tableUnderTest->addPlayer(new Player());
    }
}