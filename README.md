# Check Digit

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lloricode/check-digit.svg?style=flat-square)](https://packagist.org/packages/lloricode/check-digit)
[![GitHub Tests Action Status](https://github.com/lloricode/check-digit/workflows/Tests/badge.svg)](https://github.com/lloricode/check-digit/actions?query=workflow%3ATests+branch%3Amaster)
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

use Lloricode\CheckDigit\Generator;

$checkDigit = new Generator();

# base in https://www.gs1.org/services/check-digit-calculator

$this->assertEquals(2, $checkDigit->execute(9638527, Generator::GTIN_8));
$this->assertEquals(4, $checkDigit->execute(3216549, Generator::GTIN_8));

$this->assertEquals(2, $checkDigit->execute(91739456321, Generator::GTIN_12));
$this->assertEquals(8, $checkDigit->execute(74185245963, Generator::GTIN_12));

$this->assertEquals(3, $checkDigit->execute(629104150021, Generator::GTIN_13));
$this->assertEquals(6, $checkDigit->execute(123456789876, Generator::GTIN_13));

$this->assertEquals(6, $checkDigit->execute(7539514528423, Generator::GTIN_14));
$this->assertEquals(5, $checkDigit->execute(8563251459762, Generator::GTIN_14));

$this->assertEquals(0, $checkDigit->execute(7896541230123456, Generator::GSIN));
$this->assertEquals(3, $checkDigit->execute(7658485040650456, Generator::GSIN));

$this->assertEquals(6, $checkDigit->execute(95135623050123698, Generator::SSCC));
$this->assertEquals(7, $checkDigit->execute(87643802105978513, Generator::SSCC));
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email freek@spatie.be instead of using the issue tracker.

## Credits

- [Lloric Mayuga Garcia](https://github.com/lloricode)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
