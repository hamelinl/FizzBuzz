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
        $lastToken = null;
        $countToken = 0;

        for($line = 0; $line < 6; $line++){
            if(!is_null($this->grid->getState(0, $line))){
                if($this->grid->getState(0, $line) !== $lastToken) {
                    $lastToken = $this->grid->getState(0, $line);
                    $countToken = 1;
                }
                else{
                    $countToken++;

                    if($countToken == 4){
                        return true;
                    }
                }
            }
        }

        return false;
    }


}