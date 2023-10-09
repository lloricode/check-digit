<?php

declare(strict_types=1);

use Lloricode\CheckDigit\Enums\Format;
use Lloricode\CheckDigit\Exceptions\ValidationException;
use Lloricode\CheckDigit\Generator;

it('will throw exception when invalid length', function () {
    Generator::new(1, Format::GTIN_13());
})
    ->throws(
        ValidationException::class,
        'Invalid length of `1` for format `GTIN_13`, with value `1`'
    );
