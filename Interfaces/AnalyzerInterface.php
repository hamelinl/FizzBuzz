<?php

namespace Interfaces;

interface AnalyzerInterface
{
    public function isWinner();

    public function noWinner(): string;
}