<?php

namespace Lloricode\CheckDigit;

class Generator
{
    public const GTIN_8 = 'GTIN-8';
    public const GTIN_12 = 'GTIN-12';
    public const GTIN_13 = 'GTIN-13';
    public const GTIN_14 = 'GTIN-14';

    public const GSIN = 'GSIN';
    public const SSCC = 'SSCC';

    public const ID_KEY_FORMATS = [
        self::GTIN_8,
        self::GTIN_12,
        self::GTIN_13,
        self::GTIN_14,
        self::GSIN,
        self::SSCC,
    ];

    public function execute(string $format = self::GTIN_13): int
    {
        return 3;
    }
}
