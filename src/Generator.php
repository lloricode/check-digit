<?php

namespace Lloricode\CheckDigit;

use Lloricode\CheckDigit\Exceptions\ValidationException;

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

    private const ID_KEY_FORMATS_LENGTH = [
        self::GTIN_8 => 8,
        self::GTIN_12 => 12,
        self::GTIN_13 => 13,
        self::GTIN_14 => 14,
        self::GSIN => 17,
        self::SSCC => 18,
    ];

    /**
     * @param  int  $number
     * @param  string  $format
     *
     * @throws \Lloricode\CheckDigit\Exceptions\ValidationException
     */
    public static function validateLength(int $number, string $format)
    {
        $actualLength = strlen((string)$number);
        if (self::ID_KEY_FORMATS_LENGTH[$format] != ($actualLength + 1)) {
            throw ValidationException::length($number, $actualLength, $format);
        }
    }

    /**
     * @param  string  $format
     *
     * @throws \Lloricode\CheckDigit\Exceptions\ValidationException
     */
    private static function validateFormat(string $format)
    {
        if (!in_array($format, self::ID_KEY_FORMATS)) {
            throw ValidationException::format($format);
        }
    }

    private static function sum(int $numbers): int
    {
        $sum = 0;

        foreach (array_reverse(str_split((string)$numbers)) as $k => $number) {
            $multiplier = $k % 2 == 0
                ? 3
                : 1;

            $sum += $multiplier * $number;
        }

        return $sum;
    }

    private static function roundToNearestTen(int $number): int
    {
        return round($number / 10) * 10;
    }

    /**
     * @param  int  $numbers
     * @param  string  $format
     *
     * @return int
     * @throws \Lloricode\CheckDigit\Exceptions\ValidationException
     */
    public function execute(int $numbers, string $format = self::GTIN_13): int
    {
        self::validateFormat($format);
        self::validateLength($numbers, $format);

        $sum = self::sum($numbers);
        $roundedOf = self::roundToNearestTen($sum);

        return $roundedOf - $sum;
    }
}
