<?php

namespace Solutions\Utils;

use Solutions\Exceptions\QuestionAlreadyExistException;
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
        $class = 'Solutions\\' . static::modifyProblemNumber($problemNum);
        if (!class_exists($class)) {
            throw new ProblemNotFoundException($problemNum);
        }
        return new $class();
    }

    /**
     * Modify Problem Number.
     * e.g. 1 -> P001, p1 -> P001
     *
     * @param string $problemNum Problem number
     *
     * @return string
     */
    public static function modifyProblemNumber(string $problemNum)
    {
        if (strpos($problemNum, 'P') === 0 || strpos($problemNum, 'p') === 0) {
            return 'P' . sprintf('%03d', substr($problemNum, 1));
        } else {
            return 'P' . sprintf('%03d', $problemNum);
        }
    }

    /**
     * Generate Question File.
     *
     * @param string $problemNum Problem Number
     *
     * @return void
     * @throws QuestionAlreadyExistException
     */
    public static function generateQuestion(string $problemNum)
    {
        $problemNumber = static::modifyProblemNumber($problemNum);
        $targetFile = __DIR__ . "/../$problemNumber.php";
        if (file_exists($targetFile)) {
            throw new QuestionAlreadyExistException($targetFile);
        }
        $question = static::formatQuestion(static::fetchQuestion($problemNumber));
        $template = file_get_contents(__DIR__ . '/../templates/ProblemTemplate.txt');
        file_put_contents($targetFile, str_replace(
            '{{ProblemNumber}}',
            $problemNumber,
            str_replace('{{Question}}', $question, $template)
        ));
    }

    /**
     * Fetch Question.
     *
     * @param string $problemNum Modified Problem Number
     *
     * @return string
     */
    public static function fetchQuestion(string $problemNum): string
    {
        $dom = new \DOMDocument();
        $dom->loadHTMLFile('https://projecteuler.net/problem=' . substr($problemNum, 1));
        $xpath = new \DOMXPath($dom);
        return trim($xpath->query('//div[@class="problem_content"]')[0]->nodeValue);
    }

    /**
     * Format Question.
     *
     * @param string $question Question String
     *
     * @return string
     */
    public static function formatQuestion(string $question): string
    {
        return implode("\n", array_map(function ($line) {
            return " * $line";
        }, explode("\n", $question)));
    }
}
