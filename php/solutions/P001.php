<?php

namespace Solutions;

use Solutions\Utils\CalcurateUtils;
use Solutions\Interfaces\SolutionInterface;

/**
 * If we list all the natural numbers below 10 that are multiples of 3 or 5,
 * we get 3, 5, 6 and 9. The sum of these multiples is 23.
 * Find the sum of all the multiples of 3 or 5 below 1000.
 */
class P001 implements SolutionInterface
{
    const BELOW = 1000;
    const DIVISIONS = [3, 5];

    /**
     * Resolve problem
     *
     * @return mixed
     */
    public static function resolve()
    {
        return array_reduce(range(0, self::BELOW - 1), function ($sum, $num) {
            return (CalcurateUtils::divisibleByOneItem($num, self::DIVISIONS))? $sum + $num : $sum;
        });
    }
}
