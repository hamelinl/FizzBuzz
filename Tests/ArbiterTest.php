<?php

use Models\Arbiter;
use MockStub\AnalyzerStub;
use PHPUnit\Framework\TestCase;

class ArbiterTest extends TestCase
{
    public function testShouldReturnNoWinner()
    {
        // GIVEN
        $analyzerTest = new AnalyzerStub('Partie nulle');
        $arbiter = new Arbiter($analyzerTest);
        // WHEN
        $result = $arbiter->play('Y', 1);
        // THEN
        $this->assertSame('Partie nulle', $result);
    }

    public function testShouldNotReturnNoWinner()
    {
        // GIVEN
        $analyzerTest = new AnalyzerStub('Partie non nulle');
        $arbiter = new Arbiter($analyzerTest);
        // WHEN
        $result = $arbiter->play('Y', 1);
        // THEN
        $this->assertNotSame('Partie nulle', $result);
    }
}
