<?php

namespace Models;

use Interfaces\AnalyzerInterface;

class Arbiter
{
    private AnalyzerInterface $analyzer;

    public function __construct(AnalyzerInterface $analyzer)
    {
        $this->analyzer = $analyzer;
    }

    public function play()
    {
        return $this->analyzer->noWinner();
    }
}