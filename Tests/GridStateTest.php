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

    public function testShouldReturnRedIfThereIsARedAtZeroZero()
    {
        // GIVEN
        $this->grid->addJeton(0, 'red');
        // WHEN
        $result = $this->grid->getState(0, 0);
        // THEN
        $this->assertSame('red', $result);
    }

    public function testShouldReturnYellowIfThereIsARedAtZeroZero()
    {
        // GIVEN
        $this->grid->addJeton(0, 'yellow');
        // WHEN
        $result = $this->grid->getState(0, 0);
        // THEN
        $this->assertSame('yellow', $result);
    }

//    public function testReset()
//    {
//        $this->grid->addJeton(1, 'red');
//        $this->grid->initialize();
//        $this->assertSame();
//    }
}
