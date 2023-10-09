<?php

declare(strict_types=1);

namespace Lloricode\CheckDigit;

use Lloricode\CheckDigit\Enums\Format;
use Lloricode\CheckDigit\Exceptions\ValidationException;

class Generator
{
    private string $value;

    private int $checkDigit;

    /** @throws \Lloricode\CheckDigit\Exceptions\ValidationException */
    public function __construct(string|int $numbers, Format $format = null)
    {
        $this->checkDigit = self::execute((string) $numbers, $format ?? Format::GTIN_13());
        $this->value = $numbers.$this->checkDigit;
    }

    /** @throws \Lloricode\CheckDigit\Exceptions\ValidationException */
    private static function validateLength(string $number, Format $format): void
    {
        $actualLength = strlen($number);
        if ($format->length() !== ($actualLength + 1)) {
            throw ValidationException::length($number, $actualLength, $format);
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
    private static function execute(string $numbers, Format $format): int
    {
        self::validateLength($numbers, $format);

        $sum = self::sum((int) $numbers);

        return self::nearestEqualOrHigherThenMultiplyByTen($sum) - $sum;
    }

    public function getCheckDigit(): int
    {
        return $this->checkDigit;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
