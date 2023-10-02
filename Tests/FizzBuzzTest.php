<?php


use Models\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    public function testResult(): void
    {
        $this->assertSame('x', (new FizzBuzz())->getResult());
    }
}
