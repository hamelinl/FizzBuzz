<?php


use Models\Grid;
use PHPUnit\Framework\TestCase;

class GridStateTest extends TestCase
{
    private Grid $grid;

    public function setUp(): void
    {
        parent::setUp();
        $this->grid = new Grid();
    }

    public static function dataProviderColor(): Generator
    {
        yield [0, 'R'];
        yield [1, 'Y'];
        yield [2, 'Y'];
        yield [5, 'R'];
    }

    /**
     * @dataProvider dataProviderColor
     */
    public function testShouldReturnColorIfThereIsThatColorAtPosition($column, $color)
    {
        // GIVEN
        $this->grid->addJeton($column, $color);
        // WHEN
        $result = $this->grid->getState($column, 0);
        // THEN
        $this->assertSame($color, $result);
    }

    public static function dataProviderTwoColorsInSameColumn(): Generator
    {
        yield [3, 'R', 'Y'];
        yield [4, 'Y', 'Y'];
        yield [6, 'Y', 'R'];
    }

    /**
     * @dataProvider dataProviderTwoColorsInSameColumn
     */
    public function testAddTwoJetonSameColumn($column, $color1, $color2)
    {
        // GIVEN
        $this->grid->addJeton($column, $color1);
        $this->grid->addJeton($column, $color2);
        // WHEN
        $result1 = $this->grid->getState($column, 0);
        $result2 = $this->grid->getState($column, 1);
        // THEN
        $this->assertSame($color1, $result1);
        $this->assertSame($color2, $result2);
    }

    public function testResetGrid(){
        // GIVEN
        $this->grid->addJeton(1, 'R');
        $this->grid->addJeton(5, 'Y');
        $this->grid->initialize();
        // WHEN
        $result1 = $this->grid->getState(1, 0);
        $result2 = $this->grid->getState(5, 0);
        // THEN
        $this->assertSame(null, $result1);
        $this->assertSame(null, $result2);

    }

    public function testAddSevenJetonOnSameColumn(){
        // GIVEN
        $this->grid->addJeton(1, 'R');
        $this->grid->addJeton(1, 'Y');
        $this->grid->addJeton(1, 'R');
        $this->grid->addJeton(1, 'Y');
        $this->grid->addJeton(1, 'Y');
        $this->grid->addJeton(1, 'Y');
        // WHEN
        // THEN
        $this->expectException(Exception::class);
        $this->grid->addJeton(1, 'R');
    }
}
