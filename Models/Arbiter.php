<?php

namespace Models;

use Interfaces\AnalyzerInterface;
use Interfaces\GridInterface;

class Arbiter
{
    private AnalyzerInterface $analyzer;
    private GridInterface $grid;

    public function __construct(AnalyzerInterface $analyzer, GridInterface $grid)
    {
        $this->analyzer = $analyzer;
        $this->grid = $grid;
    }

    public function play()
    {
        return $this->analyzer->noWinner();
    }
}