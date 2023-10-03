<?php

namespace Models;

class Analyzer
{
    private Grid $grid;

    public function __construct(Grid $grid)
    {
        $this->grid = $grid;
    }

    public function isWinner()
    {
        if(($this->grid->getState(0, 0)
            && $this->grid->getState(1, 0)
            && $this->grid->getState(2, 0)
            && $this->grid->getState(3, 0))
            || ($this->grid->getState(2, 0)
            && $this->grid->getState(3, 0)
            && $this->grid->getState(4, 0)
            && $this->grid->getState(5, 0)))
            return true;


        if($this->isColumnWinner()) return true;

        return false;
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

}