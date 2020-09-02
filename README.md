# Check Digit

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lloricode/check-digit.svg?style=flat-square)](https://packagist.org/packages/lloricode/check-digit)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/lloricode/check-digit/run-tests?label=tests)](https://github.com/lloricode/check-digit/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/lloricode/check-digit.svg?style=flat-square)](https://packagist.org/packages/lloricode/check-digit)


This is where your description should go. Try and limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require lloricode/check-digit
```

## Usage

``` php
use Lloricode\CheckDigit\Generator;

$checkDigit = new Generator();
$this->assertEquals(3, $checkDigit->execute(629104150021, Generator::GTIN_13));
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
