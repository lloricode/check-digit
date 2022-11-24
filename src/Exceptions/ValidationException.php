<?php

declare(strict_types=1);

namespace Lloricode\CheckDigit\Exceptions;

use Exception;
use Lloricode\CheckDigit\Enums\Format;

class ValidationException extends Exception
{
    public static function length($value, int $actualLength, Format $format): self
    {
        return new self("Invalid length of `$actualLength` for format `$format->value`, with value `$value`");
    }
}
