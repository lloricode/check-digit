<?php

namespace Lloricode\CheckDigit\Tests\Feature;

use Lloricode\CheckDigit\Generator;
use Lloricode\CheckDigit\Tests\TestCase;

class GenerateTest extends TestCase
{
    /**
     * @throws \Lloricode\CheckDigit\Exceptions\ValidationException
     * @test
     */
    public function generator()
    {
        $checkDigit = new Generator();

        # base in https://www.gs1.org/services/check-digit-calculator

        $this->assertEquals(2, $checkDigit->execute(9638527, Generator::GTIN_8));
        $this->assertEquals(4, $checkDigit->execute(3216549, Generator::GTIN_8));

        $this->assertEquals(2, $checkDigit->execute(91739456321, Generator::GTIN_12));
        $this->assertEquals(8, $checkDigit->execute(74185245963, Generator::GTIN_12));

        $this->assertEquals(3, $checkDigit->execute(629104150021, Generator::GTIN_13));
        $this->assertEquals(6, $checkDigit->execute(123456789876, Generator::GTIN_13));

        $this->assertEquals(6, $checkDigit->execute(7539514528423, Generator::GTIN_14));
        $this->assertEquals(5, $checkDigit->execute(8563251459762, Generator::GTIN_14));

        $this->assertEquals(0, $checkDigit->execute(7896541230123456, Generator::GSIN));
        $this->assertEquals(3, $checkDigit->execute(7658485040650456, Generator::GSIN));

        $this->assertEquals(6, $checkDigit->execute(95135623050123698, Generator::SSCC));
        $this->assertEquals(7, $checkDigit->execute(87643802105978513, Generator::SSCC));
    }
}
