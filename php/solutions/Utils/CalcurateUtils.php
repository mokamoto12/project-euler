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

    public static function fibonacciSequence($below)
    {
        $seq = [];
        $cnt = 1;
        while (self::fibonacci($cnt) <= $below) {
            array_push($seq, self::fibonacci($cnt));
            $cnt++;
        }
        return $seq;
    }

    public static function fibonacci($item)
    {
        if ($item <= 1) {
            return 1;
        }
        return self::fibonacci($item - 2) + self::fibonacci($item - 1);
    }
}