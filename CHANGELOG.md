# Changelog

All notable changes to `filament-unlayer` will be documented in this file.

## v2.0.0 - TBD

### What's Changed

* **BREAKING**: Updated to support Filament v4
* **BREAKING**: Minimum PHP version is now 8.2
* **BREAKING**: Minimum Laravel version is now 11.28
* Added explicit file visibility configuration for uploads (defaults to 'public')
* Updated file upload service to handle Filament v4's new file visibility defaults
* Updated dependencies to be compatible with Filament v4
* Enhanced documentation with version compatibility guide
* Added security recommendations for file uploads

### Migration Guide

To upgrade from v1.x to v2.0:
1. Update your `composer.json` to require `"vati/filament-unlayer": "^2.0"`
2. Ensure your application is running PHP 8.2+ and Laravel 11.28+
3. Upgrade to Filament v4 in your application
4. Run `composer update vati/filament-unlayer`
5. Publish the updated config if needed: `php artisan vendor:publish --tag="filament-unlayer-config" --force`
6. Test your forms to ensure file uploads still work as expected

**Note:** Package has been forked and republished as `vati/filament-unlayer`. The namespace has been updated from `InfinityXTech\FilamentUnlayer` to `Vati\FilamentUnlayer`.

**Full Changelog**: https://github.com/vatichild/filament-unlayer/compare/v1.0.4...v2.0.0

## v1.0.4 - 2025-01-15

**Full Changelog**: https://github.com/InfinityXTech/filament-unlayer/compare/v1.0.3...v1.0.4

## v1.0.3 - 2024-11-08

### What's Changed

* Update README.md by @emildayan in https://github.com/InfinityXTech/filament-unlayer/pull/6
* Support additional options with init by @emildayan in https://github.com/InfinityXTech/filament-unlayer/pull/5

### New Contributors

* @emildayan made their first contribution in https://github.com/InfinityXTech/filament-unlayer/pull/6

**Full Changelog**: https://github.com/InfinityXTech/filament-unlayer/compare/v1.0.2...v1.0.3

## v1.0.2 - 2024-09-25

**Full Changelog**: https://github.com/InfinityXTech/filament-unlayer/compare/v1.0.1...v1.0.2

## v1.0.1 - 2024-09-25

**Full Changelog**: https://github.com/InfinityXTech/filament-unlayer/compare/v1.0.0...v1.0.1

## v1.0.0 - 2024-07-23

**Full Changelog**: https://github.com/InfinityXTech/filament-unlayer/commits/v1.0.0

## 1.0.0 - 202X-XX-XX

- initial release
