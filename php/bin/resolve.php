<?php

require __DIR__ . "/../vendor/autoload.php";

array_shift($argv);
foreach ($argv as $problemNum) {
    try {
        \Solutions\Utils\ProblemUtils::echoAnswer(\Solutions\Utils\ProblemUtils::createProblem($problemNum));
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
