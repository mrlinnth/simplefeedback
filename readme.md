# Simplefeedback

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]

Collect visitors or users feedback for Laravel project and save them to database or create GitHub issues.

**The default feedback form component has no styling or css. You can update it with your desired css styles. Or you can submit the required data to same route from your custom blade or livewire or javascript files.**

## Installation

Via Composer

```bash
composer require mrlinnth/simplefeedback
```

## Publish Vendor Files

This will publish config, migration and view component files

```bash
php artisan vendor:publish --provider="Mrlinnth\Simplefeedback\SimplefeedbackServiceProvider"
```

## Usage

1. Update the published `feedback-form.blade.php` blade component with your desired css classes/styles.

1. Call `<x-mrlinnth-feedback-form>` blade component from your view file.

1. Or you can refer to the code in `feedback-form.blade.php` and submit feedback from your blade/js/jsx/tsx files.

## GitHub Issue Integration (Optional)

Do the following to auto create issues at your GitHub repo. Refer to [GrahamCampbell/Laravel-GitHub](https://github.com/GrahamCampbell/Laravel-GitHub) for details

Publish config file

```bash
php artisan vendor:publish --provider="GrahamCampbell\GitHub\GitHubServiceProvider"
```

> Use env variable instead of placing the token and secrets directly in the `config/github.php` file.

Example `.env` file

```bash
GITHUB_TOKEN="YOUR-TOKEN"

# owner and repo are for config/simplefeedback.php
GITHUB_OWNER="YOUR-REPO-OWNER"
GITHUB_REPO="YOUR-REPO-NAME"
```

## To Do

- [ ] Screenshot of current page to save with issue
- [ ] Redirect route in config
- [ ] Feedback types in config
- [ ] Table name in config
- [ ] Format the data json for github issue
- [ ] Component with Tailwind style
- [ ] Test files

## Change log - TBD

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing - TBD

```bash
composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please create an issue.

## Credits

- [Yan][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.
