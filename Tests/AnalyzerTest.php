<?php

use Models\Analyzer;
use Models\Grid;
use PHPUnit\Framework\TestCase;

class AnalyzerTest extends TestCase
{
    private Grid $grid;
    private Analyzer $analyzer;

    public function testShouldReturnTrueIfThereIsFourJetonOfSameColorInColumn()
    {
        // GIVEN
        $this->grid = new Grid();
        $this->grid->addJeton(0, 'R');
        $this->grid->addJeton(0, 'R');
        $this->grid->addJeton(0, 'R');
        $this->grid->addJeton(0, 'R');
        // WHEN
        $result = (new Analyzer($this->grid))->isWinner();
        // THEN
        $this->assertTrue($result);
    }

    public function testShouldReturnFalseIfGridEmpty()
    {
        // GIVEN
        $this->grid = new Grid();
        // WHEN
        $result = (new Analyzer($this->grid))->isWinner();
        // THEN
        $this->assertFalse($result);
    }

    public function testShouldReturnFalseIfThereIsThreeJetonOfSameColorInColumnStartInFirstLine()
    {
        // GIVEN
        $this->grid = new Grid();
        $this->grid->addJeton(0, 'R');
        $this->grid->addJeton(0, 'R');
        $this->grid->addJeton(0, 'R');
        // WHEN
        $result = (new Analyzer($this->grid))->isWinner();
        // THEN
        $this->assertFalse($result);
    }
}