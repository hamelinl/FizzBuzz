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
        yield [0, 'red'];
        yield [1, 'yellow'];
        yield [2, 'yellow'];
        yield [5, 'red'];
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
        yield [3, 'red', 'yellow'];
        yield [4, 'yellow', 'yellow'];
        yield [6, 'yellow', 'red'];
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

//    public function testDisplayGridWith()
//    {
//        $this->assertSame(".......\n
//        .......\n
//        .......\n
//        .......\n
//        .......\n
//        .......", $this->grid->getDisplay());
//    }
//
//    public function testReset()
//    {
//        $this->grid->addJeton(1, 'red');
//        $this->grid->initialize();
//        $this->assertSame();
//    }
}
