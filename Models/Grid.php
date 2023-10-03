<?php

namespace Models;

class Grid
{
    private array $grid;
    private int $nbColumns = 7;
    private int $nbLines = 6;

    public function __construct()
    {
        $this->initialize();
    }

    public function initialize(): void
    {
        for ($column = 0; $column < $this->nbColumns; $column++) {
            for ($line = 0; $line < $this->nbLines; $line++) {
                $this->grid[$column][$line] = null;
            }
        }
    }

    public function addJeton(int $column, string $color): void
    {
        if(!is_null($this->grid[$column][$this->nbLines-1])){
            throw new \Exception('Column is full');
        }

        for ($line = 0; $line < $this->nbColumns; $line++) {
            if ($this->grid[$column][$line] === null) {
                $this->grid[$column][$line] = $color;
                break;
            }
        }
    }

    public function getState(int $column, int $line): ?string
    {
//        return 'red';
        return $this->grid[$column][$line];
    }

    public function getDisplay(): string
    {
        $displayReturn = '';

        for ($line = $this->nbLines-1; $line >=0; $line--) {
            for ($column = 0; $column < $this->nbColumns; $column++) {
                if(is_null($this->getState($column, $line)))
                    $displayReturn .= '.';
                else
                    $displayReturn .= $this->getState($column, $line);
            }

            if($line !== 0)
                $displayReturn .= "\n";
        }

        return $displayReturn;
    }
}