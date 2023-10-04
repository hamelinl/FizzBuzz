<?php


use Models\BasketHarryPotter;
use PHPUnit\Framework\TestCase;

class BasketHarryPotterTest extends TestCase
{
    public function testShouldReturnZeroIfNoBookInBasket()
    {
        // GIVEN
        $basket = new BasketHarryPotter();
        // WHEN
        $result = $basket->getPrice([]);
        // THEN
        $this->assertSame(0, $result);
    }

    public function testShouldReturnEightIfOneBookInBasket()
    {
        // GIVEN
        $basket = new BasketHarryPotter();
        // WHEN
        $result = $basket->getPrice([1]);
        // THEN
        $this->assertSame(8, $result);
    }

    public function testShouldReturnSixteenIfTwoBookOneInBasket()
    {
        // GIVEN
        $basket = new BasketHarryPotter();
        // WHEN
        $result = $basket->getPrice([1, 1]);
        // THEN
        $this->assertSame(16, $result);
    }

    public function testShouldReturnSixteenIfTwoBookThreeInBasket()
    {
        // GIVEN
        $basket = new BasketHarryPotter();
        // WHEN
        $result = $basket->getPrice([3, 3]);
        // THEN
        $this->assertSame(16, $result);
    }

    public function testShouldReturnThirtyTwoIfFourBookThreeInBasket()
    {
        // GIVEN
        $basket = new BasketHarryPotter();
        // WHEN
        $result = $basket->getPrice([3, 3, 3, 3]);
        // THEN
        $this->assertSame(32, $result);
    }

    public function testShouldReturnPriceWithFivePercentAccountWithBookOneAndTwoInBasket()
    {
        // GIVEN
        $basket = new BasketHarryPotter();
        // WHEN
        $result = $basket->getPrice([1, 2]);
        // THEN
        $this->assertSame(2 * 8 * 0.95, $result);
    }

    public function testShouldReturnPriceWithFivePercentAccountWithBookTwoAndThreeInBasket()
    {
        // GIVEN
        $basket = new BasketHarryPotter();
        // WHEN
        $result = $basket->getPrice([2, 3]);
        // THEN
        $this->assertSame(2 * 8 * 0.95, $result);
    }

    public function testShouldReturnPriceWithTenPercentAccountWithBookTwoThreeAndFiveInBasket()
    {
        // GIVEN
        $basket = new BasketHarryPotter();
        // WHEN
        $result = $basket->getPrice([2, 3, 5]);
        // THEN
        $this->assertSame(3 * 8 * 0.90, $result);
    }

    public function testShouldReturnPriceWithFivePercentAccountWithTwoBookTwoAndOneFiveBookInBasket()
    {
        // GIVEN
        $basket = new BasketHarryPotter();
        // WHEN
        $result = $basket->getPrice([2, 2, 5]);
        // THEN
        $this->assertSame(8 + 2 * 8 * 0.95, $result);
    }

    public function testShouldReturnPriceWithTenPercentAccountWithOneBookOneAndTwoBookTwoAndOneFiveBookInBasket()
    {
        // GIVEN
        $basket = new BasketHarryPotter();
        // WHEN
        $result = $basket->getPrice([1, 2, 2, 5]);
        // THEN
        $this->assertSame(8 + 3 * 8 * 0.90, $result);
    }

    public function testShouldReturnPriceWithTenPercentAccountWithOneBookOneAndTwoBookTwoAndOneFourBookAndOneFiveBookInBasket()
    {
        // GIVEN
        $basket = new BasketHarryPotter();
        // WHEN
        $result = $basket->getPrice([1, 2, 2, 4, 5]);
        // THEN
        $this->assertSame(8 + 4 * 8 * 0.80, $result);
    }
}
