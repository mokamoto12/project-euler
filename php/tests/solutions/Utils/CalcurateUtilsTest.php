<?php

namespace Tests\Solutions\Utils;

use Solutions\Utils\CalcurateUtils;

class UtilsTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Divide 10 by 2
     *
     * @test
     */
    function divisibleByOneItem_10by2_true()
    {
        $this->assertTrue(CalcurateUtils::divisibleByOneItem(10, [2]));
    }

    /**
     * Divide 10 by 2 and 3
     *
     * @test
     */
    function divisibleByOneItem_10by2and3_true()
    {
        $this->assertTrue(CalcurateUtils::divisibleByOneItem(10, [2, 3]));
    }

    /**
     * Divide 10 by 4 and 3
     *
     * @test
     */
    function divisibleByOneItem_10by4and3_false()
    {
        $this->assertFalse(CalcurateUtils::divisibleByOneItem(10, [4, 3]));
    }

    /**
     * Divide 10 by 0
     *
     * @test
     */
    function divisibleByOneItem_10by0_false()
    {
        $this->assertFalse(CalcurateUtils::divisibleByOneItem(10, [0]));
    }

    /**
     * Divide 10 by 0 and 2
     *
     * @test
     */
    function divisibleByOneItem_10by0and2_true()
    {
        $this->assertTrue(CalcurateUtils::divisibleByOneItem(10, [0, 2]));
    }

    /**
     * @test
     */
    function fibonacci_3()
    {
        $this->assertEquals(3, CalcurateUtils::fibonacci(3));
    }

    /**
     * @test
     */
    function fibonacci_10()
    {
        $this->assertEquals(89, CalcurateUtils::fibonacci(10));
    }

    /**
     * @test
     */
    function fibonacciSequence_10()
    {
        $this->assertEquals([1, 2, 3, 5, 8], CalcurateUtils::fibonacciSequence(10));
    }

    /**
     * @test
     */
    function fibonacciSequence_100()
    {
        $this->assertEquals([1, 2, 3, 5, 8, 13, 21, 34, 55, 89], CalcurateUtils::fibonacciSequence(100));
    }
}
