<?php

namespace Solutions\Utils;

use Solutions\Interfaces\SolutionInterface;
use Solutions\Exceptions\ProblemNotFoundException;

class ProblemUtils
{
    /**
     * Echo problem answer.
     *
     * @param SolutionInterface $problem Problem object
     *
     * @return void
     */
    public static function echoAnswer(SolutionInterface $problem)
    {
        $time_start = microtime(true);
        echo get_class($problem) . "\t" . $problem::resolve() . "\n";
        echo microtime(true) - $time_start . " sec.\n";
    }

    /**
     * Create problem object.
     *
     * @param string $problemNum Problem number
     *
     * @return SolutionInterface
     * @throws ProblemNotFoundException
     */
    public static function createProblem(string $problemNum)
    {
        $class = 'Solutions\\' . $problemNum;
        if (!class_exists($class)) {
            throw new ProblemNotFoundException($problemNum);
        }
        return new $class();
    }
}
