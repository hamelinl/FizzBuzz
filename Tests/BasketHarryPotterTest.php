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

    public function testShouldReturnPriceWithTenPercentAccountWithThreeDifferentBookInBasket()
    {
        // GIVEN
        $basket = new BasketHarryPotter();
        // WHEN
        $result = $basket->getPrice([2, 3, 5]);
        // THEN
        $this->assertSame(3 * 8 * 0.90, $result);
    }

    public function testShouldReturnPriceWithTwentyFivePercentAccountWithFourDifferentBookInBasket()
    {
        // GIVEN
        $basket = new BasketHarryPotter();
        // WHEN
        $result = $basket->getPrice([1, 2, 3, 4]);
        // THEN
        $this->assertSame(4 * 8 * 0.80, $result);
    }

    public function testShouldReturnPriceWithTwentyFivePercentAccountWithFiveDifferentBookInBasket()
    {
        // GIVEN
        $basket = new BasketHarryPotter();
        // WHEN
        $result = $basket->getPrice([1, 2, 3, 4, 5]);
        // THEN
        $this->assertSame(5 * 8 * 0.75, $result);
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

    public function testShouldReturnPriceWithTwentyPercentAccountWithOneBookOneAndTwoBookTwoAndOneFourBookAndOneFiveBookInBasket()
    {
        // GIVEN
        $basket = new BasketHarryPotter();
        // WHEN
        $result = $basket->getPrice([1, 2, 2, 4, 5]);
        // THEN
        $this->assertSame(8 + 4 * 8 * 0.80, $result);
    }

    public function testShouldReturnPriceWithTwentyFivePercentAccountFiveDifferentBookAndTwoSameBookInBasket()
    {
        // GIVEN
        $basket = new BasketHarryPotter();
        // WHEN
        $result = $basket->getPrice([1, 2, 2, 3, 4, 5]);
        // THEN
        $this->assertSame(8 + 5 * 8 * 0.75, $result);
    }

    public function testShouldReturnPriceWithFivePercentAccountWithTwoPackOfTwoSameBookInBasket()
    {
        // GIVEN
        $basket = new BasketHarryPotter();
        // WHEN
        $result = $basket->getPrice([0, 0, 1, 1]);
        // THEN
        $this->assertSame(2 * (8 * 2 * 0.95), $result);
    }

    public function testShouldReturnPriceWithFivePercentAccountWithThreePackOfTwoSameBookInBasket()
    {
        // GIVEN
        $basket = new BasketHarryPotter();
        // WHEN
        $result = $basket->getPrice([0, 0, 1, 1, 2, 2]);
        // THEN
        $this->assertSame(2 * (8 * 3 * 0.90), $result);
    }

    public function testShouldReturnPriceWithFivePercentAccountWithFourPackOfTwoSameBookInBasket()
    {
        // GIVEN
        $basket = new BasketHarryPotter();
        // WHEN
        // PACK : 0, 1, 2, 3 / PACK : 0, 1, 2, 3
        $result = $basket->getPrice([0, 0, 1, 1, 2, 2, 3, 3]);
        // THEN
        $this->assertSame(2 * (8 * 4 * 0.80), $result);
    }

    public function testShouldReturnPriceWithFivePercentAccountWithFivePackOfTwoSameBookInBasket()
    {
        // GIVEN
        $basket = new BasketHarryPotter();
        // WHEN
        // PACK : 0, 1, 2, 3, 4 / PACK : 0, 1, 2, 3, 4
        $result = $basket->getPrice([0, 0, 1, 1, 2, 2, 3, 3, 4, 4]);
        // THEN
        $this->assertSame(2 * (8 * 5 * 0.75), $result);
    }

    public function testShouldReturnPriceWithFivePercentAccountWithOnePackOfFourBookAndOnePackOfTwoBookInBasket()
    {
        // GIVEN
        $basket = new BasketHarryPotter();
        // WHEN
        // PACK : 0, 1, 2, 3 / PACK : 0, 2
        $result = $basket->getPrice([0, 0, 1, 2, 2, 3]);
        // THEN
        $this->assertSame(4 * 8 * 0.8 + 2 * 8 * 0.95, $result);
    }
}
