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
        # base in https://www.gs1.org/services/check-digit-calculator

        $this->assertEquals(2, (new Generator(9638527, Generator::GTIN_8))->getCheckDigit());
        $this->assertEquals(4, (new Generator(3216549, Generator::GTIN_8))->getCheckDigit());
        $this->assertEquals(7, (new Generator("0012345", Generator::GTIN_8))->getCheckDigit());
        
        $this->assertEquals(2, (new Generator(91739456321, Generator::GTIN_12))->getCheckDigit());
        $this->assertEquals(8, (new Generator(74185245963, Generator::GTIN_12))->getCheckDigit());
        $this->assertEquals(5, (new Generator("00123456789", Generator::GTIN_12))->getCheckDigit());

        $this->assertEquals(3, (new Generator(629104150021, Generator::GTIN_13))->getCheckDigit());
        $this->assertEquals(6, (new Generator(123456789876, Generator::GTIN_13))->getCheckDigit());
        $this->assertEquals(5, (new Generator("001234567890", Generator::GTIN_13))->getCheckDigit());

        $this->assertEquals(6, (new Generator(7539514528423, Generator::GTIN_14))->getCheckDigit());
        $this->assertEquals(5, (new Generator(8563251459762, Generator::GTIN_14))->getCheckDigit());
        $this->assertEquals(2, (new Generator("0012345678901", Generator::GTIN_14))->getCheckDigit());

        $this->assertEquals(0, (new Generator(7896541230123456, Generator::GSIN))->getCheckDigit());
        $this->assertEquals(3, (new Generator(7658485040650456, Generator::GSIN))->getCheckDigit());
        $this->assertEquals(3, (new Generator("0012345678901234", Generator::GSIN))->getCheckDigit());

        $this->assertEquals(6, (new Generator(95135623050123698, Generator::SSCC))->getCheckDigit());
        $this->assertEquals(7, (new Generator(87643802105978513, Generator::SSCC))->getCheckDigit());
        $this->assertEquals(2, (new Generator("00123456789012345", Generator::SSCC))->getCheckDigit());
    }

    /**
     * @throws \Lloricode\CheckDigit\Exceptions\ValidationException
     * @test
     */
    public function getGeneratedValue()
    {
        $this->assertEquals(876438021059785137, (new Generator(87643802105978513, Generator::SSCC))->getValue());
    }
}
