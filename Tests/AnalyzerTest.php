<?php

use Models\Analyzer;
use Models\Grid;
use PHPUnit\Framework\TestCase;

class AnalyzerTest extends TestCase
{
    private Grid $grid;
    private Analyzer $analyzer;

    public function setUp(): void
    {
        parent::setUp();
        $this->grid = new Grid();
        $this->analyzer = new Analyzer($this->grid);
    }

    public function testShouldReturnTrueIfThereIsFourJetonOfSameColorInColumn()
    {
        // GIVEN
        $this->grid->addJeton(0, 'R');
        $this->grid->addJeton(0, 'R');
        $this->grid->addJeton(0, 'R');
        $this->grid->addJeton(0, 'R');
        // WHEN
        $result = $this->analyzer->isFourJetonOfSameColorInColumn(0);
        // THEN
        $this->assertTrue($result);
    }
}