<?php

namespace MockStub;
use Interfaces\AnalyzerInterface;

class AnalyzerStub implements AnalyzerInterface
{
    private $response;

    public function __construct(string $response)
    {
        $this->response = $response;
    }

    public function isWinner()
    {
        // TODO: Implement isWinner() method.
    }

    public function noWinner(): string
    {
        return $this->response;
    }
}