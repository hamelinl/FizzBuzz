<?php

namespace Models;

class Analyzer
{
    private Grid $grid;

    public function __construct(Grid $grid)
    {
        $this->grid = $grid;
    }

    public function isFourJetonOfSameColorInColumn(int $columnNumber)
    {
        return true;
    }


}