<?php

namespace Lloricode\CheckDigit\Exceptions;

use Exception;
use Throwable;

final class ValidationException extends Exception
{
    private function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function format(string $format)
    {
        return new static ("Invalid format `$format`.");
    }

    public static function length($value, int $actualLength, string $format)
    {
        return new static ("Invalid length of `$actualLength` for format `$format`, with value `$value`");
    }
}
