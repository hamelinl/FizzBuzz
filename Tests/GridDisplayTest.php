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
        // GIVEN
        $this->grid->addJeton(0, 'R');
        $this->grid->addJeton(0, 'Y');
        $this->grid->addJeton(2, 'R');
        $this->grid->addJeton(4, 'R');
        $this->grid->addJeton(4, 'Y');
        $this->grid->addJeton(4, 'R');

        // THEN
        $this->assertSame(".......\n.......\n.......\n....R..\nY...Y..\nR.R.R..", $this->grid->getDisplay());
    }
}
