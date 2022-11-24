<?php

declare(strict_types=1);

use Lloricode\CheckDigit\Generator;

use function PHPUnit\Framework\assertSame;

it('generator', function () {
    # base in https://www.gs1.org/services/check-digit-calculator

    assertSame(2, (new Generator(9638527, Generator::GTIN_8))->getCheckDigit());
    assertSame(4, (new Generator(3216549, Generator::GTIN_8))->getCheckDigit());

    assertSame(2, (new Generator(91739456321, Generator::GTIN_12))->getCheckDigit());
    assertSame(8, (new Generator(74185245963, Generator::GTIN_12))->getCheckDigit());

    assertSame(3, (new Generator(629104150021, Generator::GTIN_13))->getCheckDigit());
    assertSame(6, (new Generator(123456789876, Generator::GTIN_13))->getCheckDigit());

    assertSame(6, (new Generator(7539514528423, Generator::GTIN_14))->getCheckDigit());
    assertSame(5, (new Generator(8563251459762, Generator::GTIN_14))->getCheckDigit());

    assertSame(0, (new Generator(7896541230123456, Generator::GSIN))->getCheckDigit());
    assertSame(3, (new Generator(7658485040650456, Generator::GSIN))->getCheckDigit());

    assertSame(6, (new Generator(95135623050123698, Generator::SSCC))->getCheckDigit());
    assertSame(7, (new Generator(87643802105978513, Generator::SSCC))->getCheckDigit());
});

it('generate with string and start with zero', function () {
    assertSame(7, (new Generator('0012345', Generator::GTIN_8))->getCheckDigit());
    assertSame(5, (new Generator('00123456789', Generator::GTIN_12))->getCheckDigit());
    assertSame(5, (new Generator('001234567890', Generator::GTIN_13))->getCheckDigit());
    assertSame(2, (new Generator('0012345678901', Generator::GTIN_14))->getCheckDigit());
    assertSame(3, (new Generator('0012345678901234', Generator::GSIN))->getCheckDigit());
    assertSame(2, (new Generator('00123456789012345', Generator::SSCC))->getCheckDigit());
});

it('get generated value', function () {
    assertSame(876438021059785137, (new Generator(87643802105978513, Generator::SSCC))->getValue());
});
