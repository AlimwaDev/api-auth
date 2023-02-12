# Alimwa API Auth

[![Latest Version on Packagist](https://img.shields.io/packagist/v/alimwa/api-auth.svg?style=flat-square)](https://packagist.org/packages/alimwa/api-auth)
[![Total Downloads](https://img.shields.io/packagist/dt/alimwa/api-auth.svg?style=flat-square)](https://packagist.org/packages/alimwa/api-auth)
![GitHub Actions](https://github.com/AlimwaDev/api-auth/actions/workflows/main.yml/badge.svg)

Thanks to Taylor the majority of use who handle API based authentication and authorisation now have it easy and 
through the sanctum package. However, the package only allows for the management of access tokens and the permissions 
on them which is why after implementing authentication endpoints based of off sanctum I have decided like any other dev
to create my own package that I aim to use throughout all my APIs. 

I am to start by supporting the latest version of Laravel and then creating other version to add support for more. I will
be following the PSR12 standard for those who wish to contribute and help maintain this package.

## Installation

You can install the package via composer:

```bash
composer require alimwa/auth
```

## Configuration

Once the package is installed you may run the following command to publish Sanctum bases resources.

```bash
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```

Then migrate the database if it hasn't been already.
```bash
php artisan migrate
```


## Usage

Once the package is installed you may run the following command view your new routes that you can access from SPAs 
and Mobile Apps.

```bash
php artisan route:list
```

Migrate 

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### SecurityApp

If you discover any security related issues, please email lensig13@gmail.com instead of using the issue tracker.

## Credits

-   [Lennon Mudenda](https://github.com/lennon-mudenda)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
