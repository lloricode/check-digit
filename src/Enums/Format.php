<?php

declare(strict_types=1);

namespace Lloricode\CheckDigit\Enums;

/**
 * @method static self GTIN_8()
 * @method static self GTIN_12()
 * @method static self GTIN_13()
 * @method static self GTIN_14()
 * @method static self GSIN()
 * @method static self SSCC()
 */
class Format extends \Spatie\Enum\Enum
{
    public function length(): int
    {
        return match ($this) {
            self::GTIN_8() => 8,
            self::GTIN_12() => 12,
            self::GTIN_13() => 13,
            self::GTIN_14() => 14,
            self::GSIN() => 17,
            self::SSCC() => 18,
        };
    }
}
