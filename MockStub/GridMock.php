<?php

namespace MockStub;

use Interfaces\GridInterface;

class GridMock implements GridInterface
{
    private int $callAddJeton = 1;

    public function addJeton(int $column, string $color)
    {
        // TODO: Implement addJeton() method.
    }

    public function getCallAddJeton(): int
    {
        return $this->callAddJeton;
    }
}