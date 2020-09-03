![X-Blade-Components Banner](https://github.com/masterix21/x-blade-components/blob/master/banner.png?raw=true)

[![MIT License](https://img.shields.io/github/license/masterix21/x-blade-components)](https://img.shields.io/github/license/masterix21/x-blade-components)
[![Latest Version](https://img.shields.io/github/v/release/masterix21/x-blade-components)](https://packagist.org/packages/masterix21/x-blade-components)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/masterix21/x-blade-components/Tests/master)](https://github.com/masterix21/x-blade-components/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/masterix21/x-blade-components.svg)](https://packagist.org/packages/masterix21/x-blade-components)


Ready-to-use Blade components built with TALL stack in mind. A must-have package for the artisans.

## Support us

If you like my work, you can [sponsoring me](https://github.com/sponsors/masterix21).

## Installation

You can install the package via composer:

```bash
composer require masterix21/x-blade-components

npm install tailwindcss @tailwindcss/ui alpinejs imask flatpickr @popperjs/core
// or
yarn add tailwindcss @tailwindcss/ui alpinejs imask flatpickr @popperjs/core
```

Add `@tailwindcss/ui` to your Tailwind plugin list:
```js
// tailwind.config.js
module.exports = {
  plugins: [
    require('@tailwindcss/ui'),
  ]
}
```

Add all styles to our css, less or scss:
```scss
@import "tailwindcss/base";
@import "tailwindcss/components";
@import "tailwindcss/utilities";

@import "~flatpickr/dist/themes/airbnb.css";

[x-cloak] { display: none; }
```

Import in the `bootstrap.js` file all scripts needed:
```js
// The awesome AlpineJS
import 'alpinejs';

// Flatpickr Calendar
import flatpickr from "flatpickr";
window.flatpickr = flatpickr;

// IMask to add input masks support
import IMask from 'imask';
window.IMask = IMask;

// PopperJS for the best element alignment
import { createPopper } from '@popperjs/core/lib/popper-lite.js';
import preventOverflow from '@popperjs/core/lib/modifiers/preventOverflow.js';
import flip from '@popperjs/core/lib/modifiers/flip.js';
window.createPopper = createPopper;
window.preventOverflow = preventOverflow;
window.flip = flip;
```

And finally compile all:
```bash
# dev
npm run dev 

# production
npm run prod

# or, if you use yarn...
yarn dev

yarn prod
```

## Usage

[See our wiki pages](https://github.com/masterix21/x-blade-components/wiki)

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
