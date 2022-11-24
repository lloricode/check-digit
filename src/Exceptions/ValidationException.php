<?php

declare(strict_types=1);

namespace Lloricode\CheckDigit\Exceptions;

use Exception;

class ValidationException extends Exception
{
    public static function format(string $format): self
    {
        return new self("Invalid format `$format`.");
    }

    public static function length($value, int $actualLength, string $format): self
    {
        return new self("Invalid length of `$actualLength` for format `$format`, with value `$value`");
    }
}
