<?php

namespace Lloricode\CheckDigit\Tests\Feature;

use Lloricode\CheckDigit\Exceptions\ValidationException;
use Lloricode\CheckDigit\Generator;
use Lloricode\CheckDigit\Tests\TestCase;

class ExceptionTest extends TestCase
{
    /** @test */
    public function type()
    {
        $this->expectException(ValidationException::class);
        $this->expectErrorMessage('Invalid format `xxxx`.');

        (new Generator(1, 'xxxx'));
    }

    /** @test */
    public function length()
    {
        $this->expectException(ValidationException::class);
        $this->expectErrorMessage('Invalid length of `1` for format `GTIN-13`, with value `1`');

        (new Generator(1, Generator::GTIN_13));
    }
}
