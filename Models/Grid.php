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
        $this->grid[$column][0] = $color;
    }

    public function getState(int $column, int $line): ?string
    {
//        return 'red';
        return $this->grid[$column][$line];
    }

    public function getDisplay(): string
    {
//        return 'red';
        return ".......\n
        .......\n
        .......\n
        .......\n
        .......\n
        Y......";
    }
}