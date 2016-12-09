<?php

namespace Codor\Tests\Sniffs\ControlStructures;

use Codor\Tests\BaseTestCase;

/** @group Files */
class FunctionNameContainsAndOrSniffTest extends BaseTestCase
{

    /**
     * Sets up the test class.
     * @return void
     */
    public function setup()
    {
        parent::setup();

        $this->runner->setSniff('Codor.Files.FunctionNameContainsAndOr')->setFolder(__DIR__.'/Assets/FunctionNameContainsAndOrSnuff/');
    }

    /** @test */
    public function it_detects_functions_that_are_over_the_max_allowed()
    {
        $results = $this->runner->sniff('FunctionNameContainsAndOrSniff.inc');
        $this->assertSame(6, $results->getErrorCount());
    }
}