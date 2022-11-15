# Simplefeedback

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]

Collect visitors or users feedback for Laravel project and save them to database or create GitHub issues.

## Installation

Via Composer

```bash
composer require mrlinnth/simplefeedback
```

## Usage

1. After installation, publish the package files.

   ```bash
   php artisan vendor:publish --provider="Mrlinnth\Simplefeedback\SimplefeedbackServiceProvider"
   ```

1. Update the published `feedback-form.blade.php` blade component with your desired css classes/styles.

1. Call `<x-mrlinnth-feedback-form>` blade component from your view file.

1. Or you can refer to the code in `feedback-form.blade.php` and submit feedback from your blade/js/jsx/tsx files.

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

```bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please create a new issue.

## Credits

- [Yan][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/mrlinnth/simplefeedback.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/mrlinnth/simplefeedback.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/mrlinnth/simplefeedback/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield
[link-packagist]: https://packagist.org/packages/mrlinnth/simplefeedback
[link-downloads]: https://packagist.org/packages/mrlinnth/simplefeedback
[link-travis]: https://travis-ci.org/mrlinnth/simplefeedback
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/mrlinnth
[link-contributors]: ../../contributors
