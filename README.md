# Filament Unlayer

![image](https://github.com/user-attachments/assets/92204605-3edf-48ba-81a8-0eadce20b2c5)

[![Latest Version on Packagist](https://img.shields.io/packagist/v/vati/filament-unlayer.svg?style=flat-square)](https://packagist.org/packages/vati/filament-unlayer)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/vatichild/filament-unlayer/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/vatichild/filament-unlayer/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/vati/filament-unlayer.svg?style=flat-square)](https://packagist.org/packages/vati/filament-unlayer)


This is a Filament wrapper for the Unlayer email editor with custom select field for Unlayer templates.

## Version Compatibility

| Filament | Package Version |
|----------|----------------|
| 3.x      | 1.x           |
| 4.x      | 2.x           |

## Requirements

- PHP 8.2+
- Laravel 11.28+
- Filament 4.x

## Installation

You can install the package via composer:

```bash
composer require vati/filament-unlayer
```

Create a cast within your model:

```php
protected $casts = [
   'content' => 'array',
];
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-unlayer-config"
```

This is the contents of the published config file:

```php
return [
    'upload' => [
        'url' => '/filament-unlayer-upload-action',
        'url_name' => 'filament-unlayer.upload',
        'class' => \Vati\FilamentUnlayer\Services\UploadImage::class,
        'disk' => 'public',
        'path' => 'unlayer',
        'validation' => 'required|image',
        'visibility' => 'public', // File visibility (public/private)
        'middlewares' => [], // Add auth middleware if needed: ['auth:sanctum']
    ],
];
```

Optionally, you can publish the views using:

```bash
php artisan vendor:publish --tag="filament-unlayer-views"
```

## Usage

As any other filament form field:

```php
Unlayer::make('content')->required()
```

In case you want to select unlayer templates you can use:

```php
SelectTemplate::make('template'),
Unlayer::make('content')->required()
```

By default the Unlayer field name should `content` but if you need to change it you will need to update `SelectTemplate`:

```php
SelectTemplate::make('template')
    ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set)
        => $set('description', Vati\FilamentUnlayer\Services\GetTemplates::find($state))
    ),
Unlayer::make('description')->required()
```

If you want to pass additional options to unlayer, which will join default object set by plugin with your additional data you can use:

```php
Unlayer::make('description')
    ->additionalOptions([
        'option' => 'value'
    ])
```

You can still chain other methods on these since:

`SelectTemplate` is extending filament `Select` field.

`Unlayer` is extending filament `Field` class.

## Configuration

### File Upload Security

By default, uploaded images are stored with `public` visibility on the configured disk. For production environments, consider:

1. **Add authentication middleware** to protect the upload endpoint:
```php
// In your config/filament-unlayer.php
'middlewares' => ['auth:sanctum'], // or ['auth'] for web guard
```

2. **Configure storage disk** according to your needs:
```php
'disk' => env('FILAMENT_UNLAYER_DISK', 'public'),
```

### Additional Unlayer Options

You can pass any additional options supported by the Unlayer editor:

```php
Unlayer::make('content')
    ->displayMode('web') // 'email' or 'web'
    ->height('80vh')
    ->additionalOptions([
        'appearance' => [
            'theme' => 'dark',
        ],
        'features' => [
            'audit' => true,
        ],
    ])
```

## Upgrading from v1.x to v2.x

Version 2.x adds support for Filament v4. If you're upgrading from v1.x:

1. Update your `composer.json`:
   ```json
   "vati/filament-unlayer": "^2.0"
   ```

2. Ensure your application meets the new requirements:
   - PHP 8.2+
   - Laravel 11.28+
   - Filament 4.x

3. Update dependencies:
   ```bash
   composer update vati/filament-unlayer
   ```

4. Republish the config file (optional):
   ```bash
   php artisan vendor:publish --tag="filament-unlayer-config" --force
   ```

5. Test your forms to ensure file uploads work correctly with the new visibility settings.

For detailed changes, see [CHANGELOG](CHANGELOG.md).

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
