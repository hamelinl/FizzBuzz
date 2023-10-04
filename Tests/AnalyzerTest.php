<?php

use Models\Analyzer;
use Models\Grid;
use PHPUnit\Framework\TestCase;

class AnalyzerTest extends TestCase
{
    private Grid $grid;
    private Analyzer $analyzer;

    private function initGridWithArray(Array $array){
        $this->grid = new Grid();
        foreach (array_reverse($array) as $keyLine => $line) {
            foreach ($line as $keyColumn => $color) {
                if ($color) $this->grid->addJeton($keyColumn, $color);
            }
        }
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
    public function testShouldReturnTrueIfThereIsFourJetonOfSameColorInColumn()
    {
        // GIVEN
        $gridArray = [
            5 => [null, null, null, null, null, null, null],
            4 => [null, null, null, null, null, null, null],
            3 => ['R', null, null, null, null, null, null],
            2 => ['R', null, null, null, null, null, null],
            1 => ['R', null, null, null, null, null, null],
            0 => ['R', null, null, null, null, null, null]
        ];
        $this->initGridWithArray($gridArray);
        // WHEN
        $result = (new Analyzer($this->grid))->isWinner();
        // THEN
        $this->assertTrue($result);
    }

    public function testShouldReturnFalseIfThereIsThreeJetonOfSameColorInColumn()
    {
        // GIVEN
        $gridArray = [
            5 => [null, null, null, null, null, null, null],
            4 => [null, null, null, null, null, null, null],
            3 => [null, null, null, null, null, null, null],
            2 => ['R', null, null, null, null, null, null],
            1 => ['R', null, null, null, null, null, null],
            0 => ['R', null, null, null, null, null, null]
        ];
        $this->initGridWithArray($gridArray);
        // WHEN
        $result = (new Analyzer($this->grid))->isWinner();
        // THEN
        $this->assertFalse($result);
    }

    public function testShouldReturnFalseIfThereIsOneJetonOfAnotherColorBetweenFourJetonsOfSameColorInColumn()
    {
        // GIVEN
        $gridArray = [
            5 => [null, null, null, null, null, null, null],
            4 => ['R', null, null, null, null, null, null],
            3 => ['R', null, null, null, null, null, null],
            2 => ['Y', null, null, null, null, null, null],
            1 => ['R', null, null, null, null, null, null],
            0 => ['R', null, null, null, null, null, null]
        ];
        $this->initGridWithArray($gridArray);
        // WHEN
        $result = (new Analyzer($this->grid))->isWinner();
        // THEN
        $this->assertFalse($result);
    }

    public function testShouldReturnFalseIfThereIsTwoJetonOfSameColorInColumnZeroAndOne()
    {
        // GIVEN
        $gridArray = [
            5 => [null, null, null, null, null, null, null],
            4 => [null, null, null, null, null, null, null],
            3 => [null, null, null, null, null, null, null],
            2 => [null, null, null, null, null, null, null],
            1 => ['R', 'Y', null, null, null, null, null],
            0 => ['R', 'Y', null, null, null, null, null]
        ];
        $this->initGridWithArray($gridArray);
        // WHEN
        $result = (new Analyzer($this->grid))->isWinner();
        // THEN
        $this->assertFalse($result);
    }

    public function testShouldReturnTrueIfThereIsFourYellowJetonInColumnOne()
    {
        // GIVEN
        $gridArray = [
            5 => [null, null, null, null, null, null, null],
            4 => [null, null, null, null, null, null, null],
            3 => [null, 'Y', null, null, null, null, null],
            2 => [null, 'Y', null, null, null, null, null],
            1 => [null, 'Y', null, null, null, null, null],
            0 => [null, 'Y', null, null, null, null, null]
        ];
        $this->initGridWithArray($gridArray);
        // WHEN
        $result = (new Analyzer($this->grid))->isWinner();
        // THEN
        $this->assertTrue($result);
    }

    public function testShouldReturnTrueIfThereIsFourJetonOfSameColorInLine()
    {
        // GIVEN
        $gridArray = [
            5 => [null, null, null, null, null, null, null],
            4 => [null, null, null, null, null, null, null],
            3 => [null, null, null, null, null, null, null],
            2 => [null, null, null, null, null, null, null],
            1 => [null, null, null, null, null, null, null],
            0 => ['R', 'R', 'R', 'R', null, null, null]
        ];
        $this->initGridWithArray($gridArray);
        // WHEN
        $result = (new Analyzer($this->grid))->isWinner();
        // THEN
        $this->assertTrue($result);
    }

    public function testShouldReturnFalseIfThereIsThreeJetonOfSameColorInLine()
    {
        // GIVEN
        $gridArray = [
            5 => [null, null, null, null, null, null, null],
            4 => [null, null, null, null, null, null, null],
            3 => [null, null, null, null, null, null, null],
            2 => [null, null, null, null, null, null, null],
            1 => [null, null, null, null, null, null, null],
            0 => [null, null, 'Y', 'Y', 'Y', null, null]
        ];
        $this->initGridWithArray($gridArray);
        // WHEN
        $result = (new Analyzer($this->grid))->isWinner();
        // THEN
        $this->assertFalse($result);
    }

    public function testShouldReturnTrueIfThereIsFourJetonOfSameColorInLineStartInColumnTwo()
    {
        // GIVEN
        $gridArray = [
            5 => [null, null, null, null, null, null, null],
            4 => [null, null, null, null, null, null, null],
            3 => [null, null, null, null, null, null, null],
            2 => [null, null, null, null, null, null, null],
            1 => [null, null, null, null, null, null, null],
            0 => [null, null, 'Y', 'Y', 'Y', 'Y', null]
        ];
        $this->initGridWithArray($gridArray);
        // WHEN
        $result = (new Analyzer($this->grid))->isWinner();
        // THEN
        $this->assertTrue($result);
    }

    public function testShouldReturnFalseIfThereIsOneJetonOfAnotherColorBetweenFourJetonsOfSameColorInLine()
    {
        // GIVEN
        $gridArray = [
            5 => [null, null, null, null, null, null, null],
            4 => [null, null, null, null, null, null, null],
            3 => [null, null, null, null, null, null, null],
            2 => [null, null, null, null, null, null, null],
            1 => [null, null, null, null, null, null, null],
            0 => [null, null, 'Y', 'Y', 'R', 'Y', 'Y']
        ];
        $this->initGridWithArray($gridArray);
        // WHEN
        $result = (new Analyzer($this->grid))->isWinner();
        // THEN
        $this->assertFalse($result);
    }

    public function testShouldReturnTrueIfThereIsFourJetonOfSameColorConsecutiveInLineOne()
    {
        // GIVEN
        $gridArray = [
            5 => [null, null, null, null, null, null, null],
            4 => [null, null, null, null, null, null, null],
            3 => [null, null, null, null, null, null, null],
            2 => [null, null, null, null, null, null, null],
            1 => [null, null, 'R', 'R', 'R', 'R', null],
            0 => [null, null, 'R', 'R', 'Y', 'R', null]
        ];
        $this->initGridWithArray($gridArray);
        // WHEN
        $result = (new Analyzer($this->grid))->isWinner();
        // THEN
        $this->assertTrue($result);
    }

    public function testShouldReturnTrueIfThereIsFourJetonOfSameColorConsecutiveInLineFive()
    {
        // GIVEN
        $gridArray = [
            5 => [null, null, 'R', 'R', 'R', 'R', null],
            4 => [null, null, 'R', 'R', 'Y', 'Y', null],
            3 => [null, null, 'Y', 'R', 'Y', 'R', null],
            2 => [null, null, 'R', 'Y', 'Y', 'R', null],
            1 => [null, null, 'R', 'R', 'R', 'Y', null],
            0 => [null, null, 'R', 'R', 'Y', 'R', null]
        ];
        $this->initGridWithArray($gridArray);
        // WHEN
        $result = (new Analyzer($this->grid))->isWinner();
        // THEN
        $this->assertTrue($result);
    }

    /*public function testShouldReturnTrueIfThereIsFourJetonOfSameColorAscendingDiagonalStartAtZeroZero(){
        // GIVEN
        $gridArray = [
            5 => [null, null, null, null, null, null, null],
            4 => [null, null, null, null, null, null, null],
            3 => [null, null, null, 'R', null, null, null],
            2 => [null, null, 'R', 'Y', null, null, null],
            1 => [null, 'R', 'Y', 'Y', null, null, null],
            0 => ['R', 'Y', 'Y', 'Y', null, null, null]
        ];
        $this->initGridWithArray($gridArray);
        // WHEN
        $result = (new Analyzer($this->grid))->isWinner();
        // THEN
        $this->assertTrue($result);
    }

    public function testShouldReturnTrueIfThereIsFourJetonOfSameColorAscendingDiagonalStartAtOneZero(){
        // GIVEN
        $gridArray = [
            5 => [null, null, null, null, null, null, null],
            4 => [null, null, null, null, null, null, null],
            3 => [null, null, null, null, 'R', null, null],
            2 => [null, null, null, 'R', 'Y', null, null],
            1 => [null, null, 'R', 'Y', 'Y', null, null],
            0 => [null, 'R', 'Y', 'Y', 'Y', null, null]
        ];
        $this->initGridWithArray($gridArray);
        // WHEN
        $result = (new Analyzer($this->grid))->isWinner();
        // THEN
        $this->assertTrue($result);
    }

    public function testShouldReturnTrueIfThereIsFourJetonOfSameColorAscendingDiagonalStartAtThreeZero(){
        // GIVEN
        $gridArray = [
            5 => [null, null, null, null, null, null, null],
            4 => [null, null, null, null, null, null, null],
            3 => [null, null, null, null, null, null, 'R'],
            2 => [null, null, null, null, null, 'R', 'Y'],
            1 => [null, null, null, null, 'R', 'Y', 'Y'],
            0 => [null, null, null, 'R', 'Y', 'Y', 'Y']
        ];
        $this->initGridWithArray($gridArray);
        // WHEN
        $result = (new Analyzer($this->grid))->isWinner();
        // THEN
        $this->assertTrue($result);
    }*/
}