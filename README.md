# Password Vault functionality for Intranet

[![Latest Version on Packagist](https://img.shields.io/packagist/v/i616-solutions-llc/soteria.svg?style=flat-square)](https://packagist.org/packages/i616-solutions-llc/soteria)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/i616-solutions-llc/soteria/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/i616-solutions-llc/soteria/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/i616-solutions-llc/soteria/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/i616-solutions-llc/soteria/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/i616-solutions-llc/soteria.svg?style=flat-square)](https://packagist.org/packages/i616-solutions-llc/soteria)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us
## Installation

You can install the package via composer:

```bash
composer require i616/soteria
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="soteria-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="soteria-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="soteria-views"
```

## Usage

```php
$soteria = new i616\Soteria();
echo $soteria->echoPhrase('Hello, i616!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Joseph Hagerty](https://github.com/joeh)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
