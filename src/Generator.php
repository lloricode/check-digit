<?php

declare(strict_types=1);

namespace Lloricode\CheckDigit;

use Lloricode\CheckDigit\Exceptions\ValidationException;

class Generator
{
    public const GTIN_8 = 'GTIN-8';
    public const GTIN_12 = 'GTIN-12';
    public const GTIN_13 = 'GTIN-13';
    public const GTIN_14 = 'GTIN-14';

    public const GSIN = 'GSIN'; // 17 digit
    public const SSCC = 'SSCC'; // 18 digit

    public const ID_KEY_FORMATS = [
        self::GTIN_8,
        self::GTIN_12,
        self::GTIN_13,
        self::GTIN_14,
        self::GSIN,
        self::SSCC,
    ];

    public const ID_KEY_FORMATS_LENGTH = [
        self::GTIN_8 => 8,
        self::GTIN_12 => 12,
        self::GTIN_13 => 13,
        self::GTIN_14 => 14,
        self::GSIN => 17,
        self::SSCC => 18,
    ];

    private int $value;
    private int $checkDigit;

    /** @throws \Lloricode\CheckDigit\Exceptions\ValidationException */
    public function __construct(string|int $numbers, string $format = self::GTIN_13)
    {
        $this->checkDigit = self::execute((string) $numbers, $format);
        $this->value = ($numbers * 10) + $this->checkDigit;
    }

    /** @throws \Lloricode\CheckDigit\Exceptions\ValidationException */
    private static function validateLength(string $number, string $format): void
    {
        $actualLength = strlen($number);
        if (self::ID_KEY_FORMATS_LENGTH[$format] != ($actualLength + 1)) {
            throw ValidationException::length($number, $actualLength, $format);
        }
    }

    /** @throws \Lloricode\CheckDigit\Exceptions\ValidationException */
    private static function validateFormat(string $format): void
    {
        if ( ! in_array($format, self::ID_KEY_FORMATS)) {
            throw ValidationException::format($format);
        }
    }

    private static function sum(int $numbers): int
    {
        $sum = 0;

        foreach (array_reverse(str_split((string) $numbers)) as $k => $number) {
            $multiplier = $k % 2 == 0
                ? 3
                : 1;

            $sum += $multiplier * ((int) $number);
        }

        return $sum;
    }

    private static function nearestEqualOrHigherThenMultiplyByTen(int $number): int
    {
        return (int) ceil($number / 10) * 10;
    }

    /** @throws \Lloricode\CheckDigit\Exceptions\ValidationException */
    private static function execute(string $numbers, string $format = self::GTIN_13): int
    {
        self::validateFormat($format);
        self::validateLength($numbers, $format);

        $sum = self::sum((int) $numbers);

        return self::nearestEqualOrHigherThenMultiplyByTen($sum) - $sum;
    }

    public function getCheckDigit(): int
    {
        return $this->checkDigit;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
