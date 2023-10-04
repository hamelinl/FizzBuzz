<?php

namespace Models;

use Interfaces\AnalyzerInterface;

class Analyzer implements AnalyzerInterface
{
    private Grid $grid;

    public function __construct(Grid $grid)
    {
        $this->grid = $grid;
    }

    public function isWinner()
    {
        /*for($column=0; $column<4;$column++){
            if($this->grid->getState($column, 0)
                && $this->grid->getState($column+1, 1) === $this->grid->getState(0, 0)
                && $this->grid->getState($column+2, 2) === $this->grid->getState(0, 0)
                && $this->grid->getState(3, 3) === $this->grid->getState(0, 0)) {
                return true;
            }
        }*/
        /*if($this->grid->getState(0, 0)
            && $this->grid->getState(1, 1) === $this->grid->getState(0, 0)
            && $this->grid->getState(2, 2) === $this->grid->getState(0, 0)
            && $this->grid->getState(3, 3) === $this->grid->getState(0, 0)){
            return true;
        }
        if($this->grid->getState(1, 0)
            && $this->grid->getState(2, 1) === $this->grid->getState(1, 0)
            && $this->grid->getState(3, 2) === $this->grid->getState(1, 0)
            && $this->grid->getState(4, 3) === $this->grid->getState(1, 0)){
            return true;
        }

        if($this->grid->getState(3, 0)
            && $this->grid->getState(4, 1) === $this->grid->getState(3, 0)
            && $this->grid->getState(5, 2) === $this->grid->getState(3, 0)
            && $this->grid->getState(6, 3) === $this->grid->getState(3, 0)){
            return true;
        }*/

        if($this->isColumnWinner() || $this->isLineWinner()) return true;

        return false;
    }

    public function noWinner(): string
    {
        // TODO: Implement noWinner() method.
        return '';
    }

    private function isColumnWinner(){

        for($column = 0; $column < 7; $column++) {
            $lastToken = null;
            $countToken = 0;

            for ($line = 0; $line < 6; $line++) {
                if (!is_null($this->grid->getState($column, $line))) {
                    if ($this->grid->getState($column, $line) !== $lastToken) {
                        $lastToken = $this->grid->getState($column, $line);
                        $countToken = 1;
                    } else {
                        $countToken++;

                        if ($countToken == 4) {
                            return true;
                        }
                    }
                }
            }
        }

        return false;
    }

    private function isLineWinner()
    {
        for ($line = 0; $line < 6; $line++) {
            for($column = 0; $column < 5; $column++){
                if($this->grid->getState($column, $line)
                    && $this->grid->getState($column+1, $line) === $this->grid->getState($column, $line)
                    && $this->grid->getState($column+2, $line) === $this->grid->getState($column, $line)
                    && $this->grid->getState($column+3, $line) === $this->grid->getState($column, $line)){
                    return true;
                }
            }
        }
        return false;
    }
}