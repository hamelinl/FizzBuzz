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

        for($column = 0; $column < 5; $column++){
            if($this->grid->getState($column, 0)
            && $this->grid->getState($column+1, 0) === $this->grid->getState($column, 0)
            && $this->grid->getState($column+2, 0) === $this->grid->getState($column, 0)
            && $this->grid->getState($column+3, 0) === $this->grid->getState($column, 0)){
                var_dump('ici');
                var_dump($column);
                var_dump($this->grid->getState($column, 0));
                var_dump($this->grid->getState($column+1, 0));
                var_dump($this->grid->getState($column+2, 0));
                var_dump($this->grid->getState($column+3, 0));
                //var_dump($this->grid);

                return true;
            }
            if($this->grid->getState($column, 1)
                && $this->grid->getState($column+1, 1) === $this->grid->getState($column, 1)
                && $this->grid->getState($column+2, 1) === $this->grid->getState($column, 1)
                && $this->grid->getState($column+3, 1) === $this->grid->getState($column, 1)){
                return true;
            }
        }

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