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
        if($this->grid->getState(0,0)
            && $this->grid->getState(0,1)
            && $this->grid->getState(0,2)
            && $this->grid->getState(0,3)){
            return true;
        }

        return false;
    }


}