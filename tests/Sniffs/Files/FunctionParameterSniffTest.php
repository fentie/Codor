<?php

namespace Codor\Tests\Sniffs\ControlStructures;

use Codor\Tests\BaseTestCase;

/** @group Files */
class FunctionParameterSniffTest extends BaseTestCase
{

    public function setup()
    {
        parent::setup();

        $this->runner->setSniff('Codor.Files.FunctionParameter')->setFolder(__DIR__.'/Assets/FunctionParameterSniff/');
    }

	/** @test */
    public function it_produces_an_error_when_a_function_has_4_or_more_parameters()
    {
        $results = $this->runner->sniff('FunctionsWithFourOrMoreParameters.inc');
        $this->assertEquals(4, $results->getErrorCount());
    }

    /** @test */
    public function it_produces_a_warning_when_a_function_has_3_parameters()
    {
        $results = $this->runner->sniff('FunctionWithThreeParameters.inc');
        $this->assertEquals(2, $results->getWarningCount());
    }

    /** @test */
    public function it_produces_no_warnings_or_errors_with_functions_with_2_or_fewer_parameters()
    {
        $results = $this->runner->sniff('FunctionWithTwoOrFewerParameters.inc');
        $this->assertEquals(0, $results->getWarningCount());
        $this->assertEquals(0, $results->getErrorCount());
    }
}