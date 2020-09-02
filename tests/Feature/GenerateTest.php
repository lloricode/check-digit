<?php

namespace Lloricode\CheckDigit\Tests\Feature;

use Lloricode\CheckDigit\Generator;
use Lloricode\CheckDigit\Tests\TestCase;

class GenerateTest extends TestCase
{
    /** @test */
    public function generator()
    {
        $checkDigit = new Generator();

        $this->assertEquals(3, $checkDigit->execute(629104150021, Generator::GTIN_13));
    }
}
