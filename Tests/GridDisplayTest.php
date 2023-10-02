<?php


use Models\Grid;
use PHPUnit\Framework\TestCase;

class GridDisplayTest extends TestCase
{
    private Grid $grid;

    public function setUp(): void
    {
        parent::setUp();
        $this->grid = new Grid();
    }

    public function testDisplayGridWith()
    {
        $this->assertSame("******\n
        ******\n
        ******\n
        ******\n
        ******\n
        Y*****", $this->grid->getDisplay());
    }
}
