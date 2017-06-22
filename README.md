# Krecent Api

[![Latest Version](https://img.shields.io/github/release/thephpleague/skeleton.svg?style=flat-square)](https://github.com/krecent/api/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/thephpleague/skeleton/master.svg?style=flat-square)](https://travis-ci.org/thephpleague/skeleton)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/thephpleague/skeleton.svg?style=flat-square)](https://scrutinizer-ci.com/g/thephpleague/skeleton/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/thephpleague/skeleton.svg?style=flat-square)](https://scrutinizer-ci.com/g/thephpleague/skeleton)
[![Total Downloads](https://img.shields.io/packagist/dt/league/skeleton.svg?style=flat-square)](https://packagist.org/packages/krecent/api)


This package is a test package to help Krecent with pushing packages to composer

## Install

Via Composer

``` bash
$ composer require krecent/api
```

## Usage

``` php
$Api = new Krecent\Api($uri);
echo $Api->getUser($username , $password , $userAgent);
```

## Testing

``` bash
$ phpunit
```

## Contributing

Please see [CONTRIBUTING](https://github.com/krecent/api/blob/master/CONTRIBUTING.md) for details.

## Credits

- [Waheed Derby](https://github.com/wadederby)
- [All Contributors](https://github.com/krecent/api/contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
