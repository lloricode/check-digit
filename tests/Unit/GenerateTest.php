<?php

namespace Lloricode\CheckDigit\Tests\Unit;

use Lloricode\CheckDigit\Generator;
use Lloricode\CheckDigit\Tests\TestCase;

class GenerateTest extends TestCase
{
    /** @test */
    public function generator()
    {
        $checkDigit = new Generator();

        $this->assertEquals(3, $checkDigit->execute(Generator::GTIN_13));
    }
}
