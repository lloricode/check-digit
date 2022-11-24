<?php

declare(strict_types=1);

namespace Lloricode\CheckDigit\Enums;

enum Format: string
{
    case GTIN_8 = 'GTIN-8';
    case GTIN_12 = 'GTIN-12';
    case GTIN_13 = 'GTIN-13';
    case GTIN_14 = 'GTIN-14';

    case GSIN = 'GSIN'; // 17 digit
    case SSCC = 'SSCC'; // 18 digit

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
