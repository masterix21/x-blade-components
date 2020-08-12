# Laravel Blade Components ready to use (🚧 🚧 🚧)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/masterix21/x-blade-components.svg?style=flat-square)](https://packagist.org/packages/masterix21/x-blade-components)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/masterix21/x-blade-components/run-tests?label=tests)](https://github.com/masterix21/x-blade-components/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/masterix21/x-blade-components.svg?style=flat-square)](https://packagist.org/packages/masterix21/x-blade-components)

Tailwind.css ready components well tested for Laravel applications. Ideally with a TALL stack configuration.

...to be continued...

## Support us

If you like my work, you can [sponsoring me](https://github.com/masterix21).

## Installation

You can install the package via composer:

```bash
composer require masterix21/x-blade-components

npm install tailwindcss @tailwindcss/ui alpinejs imask flatpickr
// or
yarn add tailwindcss @tailwindcss/ui alpinejs imask flatpickr
```

Then add `@tailwindcss/ui` to your Tailwind plugin list:
```js
// tailwind.config.js
module.exports = {
  plugins: [
    require('@tailwindcss/ui'),
  ]
}
```

Finally, it's important to add all styles to our css, less or scss:
```scss
[x-cloak] { display: none; }

@import '~flatpickr/dist/flatpickr.min.css';
```

## Usage

*** Work in progress ***

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email l.longo@ambita.it instead of using the issue tracker.

## Credits

- [Luca Longo](https://github.com/masterix21)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
