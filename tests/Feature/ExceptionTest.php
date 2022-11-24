<?php

declare(strict_types=1);

use Lloricode\CheckDigit\Exceptions\ValidationException;
use Lloricode\CheckDigit\Generator;

it('will throw exception when invalid format', function () {
    $this->expectException(ValidationException::class);
    $this->expectErrorMessage('Invalid format `xxxx`.');

    (new Generator(1, 'xxxx'));
});

it('will throw exception when invalid length', function () {
    $this->expectException(ValidationException::class);
    $this->expectErrorMessage('Invalid length of `1` for format `GTIN-13`, with value `1`');

    (new Generator(1, Generator::GTIN_13));
});
