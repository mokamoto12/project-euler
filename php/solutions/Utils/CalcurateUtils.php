<?php

namespace Solutions\Utils;

class CalcurateUtils
{
    /**
     * Divisible by one array item.
     *
     * @param int   $dividend Divided Number
     * @param array $divisors divisors
     *
     * @return bool
     */
    public static function divisibleByOneItem(int $dividend, array $divisors)
    {
        foreach ($divisors as $divisor) {
            if (empty($divisor)) {
                continue;
            }
            if ($dividend % $divisor === 0) {
                return true;
            }
        }
        return false;
    }
}