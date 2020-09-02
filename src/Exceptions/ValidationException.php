<?php

namespace Lloricode\CheckDigit\Exceptions;

use Exception;

class ValidationException extends Exception
{

    public static function format(string $format)
    {
        return new static ("Invalid format `$format`.");
    }

    public static function length($value, int $actualLength, string $format)
    {
        return new static ("Invalid length of `$actualLength` for format `$format`, with value `$value`");
    }
}
