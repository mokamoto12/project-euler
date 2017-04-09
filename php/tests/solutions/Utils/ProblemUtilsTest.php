<?php

namespace Tests\Solutions\Utils;

use Solutions\Interfaces\SolutionInterface;
use Solutions\Utils\ProblemUtils;

class ProblemUtilsTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    function createProblem_P001()
    {
        $this->assertInstanceOf(SolutionInterface::class, ProblemUtils::createProblem('P001'));
    }

    /**
     * @test
     */
    function createProblem_p002()
    {
        $this->assertInstanceOf(SolutionInterface::class, ProblemUtils::createProblem('p002'));
    }

    /**
     * @test
     */
    function createProblem_P1()
    {
        $this->assertInstanceOf(SolutionInterface::class, ProblemUtils::createProblem('P1'));
    }

    /**
     * @test
     */
    function createProblem_p2()
    {
        $this->assertInstanceOf(SolutionInterface::class, ProblemUtils::createProblem('p2'));
    }

    /**
     * @test
     */
    function createProblem_1()
    {
        $this->assertInstanceOf(SolutionInterface::class, ProblemUtils::createProblem('1'));
    }

    /**
     * @test
     */
    function modifyProblemNumber_P001()
    {
        $this->assertEquals('P001', ProblemUtils::modifyProblemNumber('P001'));
    }
}
