<?php

declare(strict_types=1);

use Lloricode\CheckDigit\Exceptions\ValidationException;
use Lloricode\CheckDigit\Generator;

it('will throw exception when invalid format', function () {
    (new Generator(1, 'xxxx'));
})
->throws(
    ValidationException::class,
    'Invalid format `xxxx`.'
);

it('will throw exception when invalid length', function () {
    (new Generator(1, Generator::GTIN_13));
})
    ->throws(
        ValidationException::class,
        'Invalid length of `1` for format `GTIN-13`, with value `1`'
    );
