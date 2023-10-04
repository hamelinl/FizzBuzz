<?php

use MockStub\GridMock;
use Models\Arbiter;
use MockStub\AnalyzerStub;
use Models\Grid;
use PHPUnit\Framework\TestCase;

class ArbiterTest extends TestCase
{
    public function testShouldReturnNoWinner()
    {
        // GIVEN
        $analyzerTest = new AnalyzerStub('Partie nulle');
        $grid = new Grid();
        $arbiter = new Arbiter($analyzerTest, $grid);
        // WHEN
        $result = $arbiter->play('Y', 1);
        // THEN
        $this->assertSame('Partie nulle', $result);
    }

    public function testShouldNotReturnNoWinner()
    {
        // GIVEN
        $analyzerTest = new AnalyzerStub('Partie non nulle');
        $grid = new Grid();
        $arbiter = new Arbiter($analyzerTest, $grid);
        // WHEN
        $result = $arbiter->play('Y', 1);
        // THEN
        $this->assertNotSame('Partie nulle', $result);
    }

    public function testWhenPlayerAddJetonShouldCallGridAddJeton()
    {
        $grid = new GridMock();
        $analyzerTest = new AnalyzerStub('Partie non nulle');
        $arbiter = new Arbiter($analyzerTest, $grid);
        // WHEN
        $arbiter->play('Y', 1);
        // THEN
        $this->assertSame(1, $grid->getCallAddJeton());
    }
}
