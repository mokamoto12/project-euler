<?php

require __DIR__ . "/../vendor/autoload.php";

$problemNum = $argv[1];

try {
    \Solutions\Utils\ProblemUtils::generateQuestion($problemNum);
} catch (Exception $e) {
    echo $e->getMessage();
}
