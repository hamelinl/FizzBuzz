<?php

namespace Models;

class BasketHarryPotter
{
    private int $price = 8;

    public function getPrice(?array $array = null): int|float
    {
        if (count($array) === 1) return $this->price;

        $countBooks = count($array);
        $countUnique = count(array_unique($array));

        if ($countUnique === 1) {
            return count($array) * $this->price;
        } elseif ($countUnique > 1) {
            if ($countUnique === $countBooks) {
                return $this->getPriceWithUniqueBook($countUnique);
            } else {
                $divergeBook = $countBooks - $countUnique;
                if ($divergeBook === 1) {
                    return $this->getPriceWithUniqueBook($countUnique, true);
                }
            }
        }

        return 0;
    }

    public function getPriceWithUniqueBook(int $unique, bool $double = false) {
        switch ($unique) {
            case 2:
                return $double === true ? $this->price + $this->price * 2 * 0.95 : $this->price * 2 * 0.95;
            case 3:
                return $double === true ? $this->price + $this->price * 3 * 0.90 : $this->price * 3 * 0.90;
            case 4:
                return $double === true ? $this->price + $this->price * 4 * 0.80 : $this->price * 4 * 0.80;
        }
    }
}