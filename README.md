# Check Digit

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lloricode/check-digit.svg?style=flat-square)](https://packagist.org/packages/lloricode/check-digit)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/lloricode/check-digit/Tests?label=tests)](https://github.com/lloricode/check-digit/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/lloricode/check-digit.svg?style=flat-square)](https://packagist.org/packages/lloricode/check-digit)


Check digit formula base on https://www.gs1.org/services/how-calculate-check-digit-manually,
and tested by https://www.gs1.org/services/check-digit-calculator

## Installation

You can install the package via composer:

```bash
composer require lloricode/check-digit
```

## Usage

``` php

// Sample usage in testing
// tests/Feature/GenerateTest.php

use Lloricode\CheckDigit\Enums\Format;
use Lloricode\CheckDigit\Generator;

# base in https://www.gs1.org/services/check-digit-calculator

assertSame(2, (new Generator(9638527, Format::GTIN_8))->getCheckDigit());
assertSame(4, (new Generator(3216549, Format::GTIN_8))->getCheckDigit());

assertSame(2, (new Generator(91739456321, Format::GTIN_12))->getCheckDigit());
assertSame(8, (new Generator(74185245963, Format::GTIN_12))->getCheckDigit());

assertSame(3, (new Generator(629104150021, Format::GTIN_13))->getCheckDigit());
assertSame(6, (new Generator(123456789876, Format::GTIN_13))->getCheckDigit());

assertSame(6, (new Generator(7539514528423, Format::GTIN_14))->getCheckDigit());
assertSame(5, (new Generator(8563251459762, Format::GTIN_14))->getCheckDigit());

assertSame(0, (new Generator(7896541230123456, Format::GSIN))->getCheckDigit());
assertSame(3, (new Generator(7658485040650456, Format::GSIN))->getCheckDigit());

assertSame(6, (new Generator(95135623050123698, Format::SSCC))->getCheckDigit());
assertSame(7, (new Generator(87643802105978513, Format::SSCC))->getCheckDigit());

// get generated value
assertSame(876438021059785137, (new Generator(87643802105978513, Format::SSCC))->getValue());

// starts with zero
assertSame(7, (new Generator('0012345', Format::GTIN_8))->getCheckDigit());
assertSame(5, (new Generator('00123456789', Format::GTIN_12))->getCheckDigit());
assertSame(5, (new Generator('001234567890', Format::GTIN_13))->getCheckDigit());
assertSame(2, (new Generator('0012345678901', Format::GTIN_14))->getCheckDigit());
assertSame(3, (new Generator('0012345678901234', Format::GSIN))->getCheckDigit());
assertSame(2, (new Generator('00123456789012345', Format::SSCC))->getCheckDigit());
```

## Testing

``` bash
vendor/bin/pest
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email lloricode@gmail.com instead of using the issue tracker.

## Credits

- [Lloric Mayuga Garcia](https://github.com/lloricode)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
