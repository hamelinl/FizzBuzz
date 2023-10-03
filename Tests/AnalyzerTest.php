<?php

use Models\Analyzer;
use Models\Grid;
use PHPUnit\Framework\TestCase;

class AnalyzerTest extends TestCase
{
    private Grid $grid;
    private Analyzer $analyzer;

    public function testShouldReturnFalseIfGridEmpty()
    {
        // GIVEN
        $this->grid = new Grid();
        // WHEN
        $result = (new Analyzer($this->grid))->isWinner();
        // THEN
        $this->assertFalse($result);
    }
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

    public function testShouldReturnFalseIfThereIsThreeJetonOfSameColorInColumn()
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

    public function testShouldReturnFalseIfThereIsOneJetonOfAnotherColorBetweenFourJetonsOfSameColor()
    {
        // GIVEN
        $this->grid = new Grid();
        $this->grid->addJeton(0, 'R');
        $this->grid->addJeton(0, 'R');
        $this->grid->addJeton(0, 'Y');
        $this->grid->addJeton(0, 'R');
        $this->grid->addJeton(0, 'R');
        // WHEN
        $result = (new Analyzer($this->grid))->isWinner();
        // THEN
        $this->assertFalse($result);
    }

    public function testShouldReturnFalseIfThereIsTwoJetonOfSameColorInColumnZeroAndOne()
    {
        // GIVEN
        $this->grid = new Grid();
        $this->grid->addJeton(0, 'R');
        $this->grid->addJeton(0, 'R');
        $this->grid->addJeton(1, 'Y');
        $this->grid->addJeton(1, 'Y');
        // WHEN
        $result = (new Analyzer($this->grid))->isWinner();
        // THEN
        $this->assertFalse($result);
    }

    public function testShouldReturnTrueIfThereIsFourYellowJetonInColumnOne()
    {
        // GIVEN
        $this->grid = new Grid();
        $this->grid->addJeton(1, 'Y');
        $this->grid->addJeton(1, 'Y');
        $this->grid->addJeton(1, 'Y');
        $this->grid->addJeton(1, 'Y');
        // WHEN
        $result = (new Analyzer($this->grid))->isWinner();
        // THEN
        $this->assertTrue($result);
    }

    public function testShouldReturnTrueIfThereIsFourJetonOfSameColorInLine()
    {
        // GIVEN
        $this->grid = new Grid();
        $this->grid->addJeton(0, 'R');
        $this->grid->addJeton(1, 'R');
        $this->grid->addJeton(2, 'R');
        $this->grid->addJeton(3, 'R');
        // WHEN
        $result = (new Analyzer($this->grid))->isWinner();
        // THEN
        $this->assertTrue($result);
    }

    public function testShouldReturnFalseIfThereIsThreeJetonOfSameColorInLine()
    {
        // GIVEN
        $this->grid = new Grid();
        $this->grid->addJeton(2, 'Y');
        $this->grid->addJeton(3, 'Y');
        $this->grid->addJeton(4, 'Y');
        // WHEN
        $result = (new Analyzer($this->grid))->isWinner();
        // THEN
        $this->assertFalse($result);
    }
}