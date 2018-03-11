# Clash Of Clans API

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-packagist]

## Install

Via Composer

``` bash
$ composer require polakosz/clash-of-clans-api
```

## Usage

``` php
use PoLaKoSz\ClashOfClansAPI as CoC;
...
$apiKey = 'eyJ0eX...';
$api = new CoC\ClashOfClansApi($apiKey);
$response = $api->getClanyByTag('#Y0PPL9V');

echo $response;
```

## Testing

See [this](https://github.com/PoLaKoSz/ClashOfClansAPI/issues/5) issue.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE OF CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email polakosz@freemail.hu instead of using the issue tracker.

## Credits

- [Tom PoLáKoSz][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/polakosz/clash-of-clans-api.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/polakosz/clash-of-clans-api.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/polakosz/clash-of-clans-api
[link-author]: https://github.com/PoLáKoSz
[link-contributors]: ../../contributors
