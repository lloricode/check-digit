<?php

declare(strict_types=1);

use Lloricode\CheckDigit\Enums\Format;
use Lloricode\CheckDigit\Generator;

use function PHPUnit\Framework\assertMatchesRegularExpression;
use function PHPUnit\Framework\assertSame;

it('Format', function () {
    // base in https://www.gs1.org/services/check-digit-calculator

    assertSame(2, (new Generator(9638527, Format::GTIN_8))->getCheckDigit());
    assertSame(4, (new Generator(3216549, Format::GTIN_8))->getCheckDigit());

    assertSame(2, (new Generator(91739456321, Format::GTIN_12))->getCheckDigit());
    assertSame(8, (new Generator(74185245963, Format::GTIN_12))->getCheckDigit());

    assertSame(3, (new Generator(629104150021, Format::GTIN_13))->getCheckDigit());
    assertSame(6, (new Generator(123456789876, Format::GTIN_13))->getCheckDigit());

    assertSame(6, (new Generator(7539514528423, Format::GTIN_14))->getCheckDigit());
    assertSame(5, (new Generator(8563251459762, Format::GTIN_14))->getCheckDigit());

    assertSame(0, (new Generator(7896541230123456, Format::GSIN))->getCheckDigit());
    assertSame(3, (new Generator(7658485040650456, Format::GSIN))->getCheckDigit());

    assertSame(6, (new Generator(95135623050123698, Format::SSCC))->getCheckDigit());
    assertSame(7, (new Generator(87643802105978513, Format::SSCC))->getCheckDigit());
});

it('generate with string and start with zero', function () {
    assertSame(7, (new Generator('0012345', Format::GTIN_8))->getCheckDigit());
    assertSame(5, (new Generator('00123456789', Format::GTIN_12))->getCheckDigit());
    assertSame(5, (new Generator('001234567890', Format::GTIN_13))->getCheckDigit());
    assertSame(2, (new Generator('0012345678901', Format::GTIN_14))->getCheckDigit());
    assertSame(3, (new Generator('0012345678901234', Format::GSIN))->getCheckDigit());
    assertSame(2, (new Generator('00123456789012345', Format::SSCC))->getCheckDigit());
});

it('get generated value', function () {
    assertSame('876438021059785137', (new Generator(87643802105978513, Format::SSCC))->getValue());
});

it('repeat', function () {
    foreach (range(1, 500) as $i) {

        assertSame('12345670', (new Generator('1234567', Format::GTIN_8))->getValue());
        assertSame('123456789012', (new Generator('12345678901', Format::GTIN_12))->getValue());
        assertSame('1234567890128', (new Generator('123456789012', Format::GTIN_13))->getValue());
        assertSame('12345678901231', (new Generator('1234567890123', Format::GTIN_14))->getValue());
        assertSame('12345678901234560', (new Generator('1234567890123456', Format::GSIN))->getValue());
        assertSame('123456789012345675', (new Generator('12345678901234567', Format::SSCC))->getValue());

    }
});
it('repeat random', function () {

    $random = function (int $length): string {
        $length--;

        $randomNumber = '';

        foreach (range(1, $length) as $i) {
            $randomNumber .= mt_rand(0, 9);
        }

        return $randomNumber;
    };

    foreach (range(1, 500) as $i) {

        foreach (Format::cases() as $format) {

            $result = new Generator($random($format->length()), $format);
            assertMatchesRegularExpression(
                '/^[0-9]{'.$format->length().'}$/',
                (string) $result->getValue(),
                'Failed on:'.$i.', format: '.$format->value,
            );
        }

    }
});
