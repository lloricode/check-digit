<?php

declare(strict_types=1);

namespace Lloricode\CheckDigit\Enums;

enum Format: string
{
    case GTIN_8 = 'GTIN_8';
    case GTIN_12 = 'GTIN_12';
    case GTIN_13 = 'GTIN_13';
    case GTIN_14 = 'GTIN_14';
    case GSIN = 'GSIN';
    case SSCC = 'SSCC';

    public function length(): int
    {
        return match ($this) {
            self::GTIN_8 => 8,
            self::GTIN_12 => 12,
            self::GTIN_13 => 13,
            self::GTIN_14 => 14,
            self::GSIN => 17,
            self::SSCC => 18,
        };
    }
}
