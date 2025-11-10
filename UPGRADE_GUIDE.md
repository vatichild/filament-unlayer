# Filament Unlayer v2.0 - Upgrade Guide

## Overview

This guide will help you upgrade from Filament Unlayer v1.x (Filament 3) to v2.0 (Filament 4).

## Requirements

Before upgrading, ensure your application meets these requirements:

- **PHP**: 8.2 or higher (upgraded from 8.1)
- **Laravel**: 11.28 or higher (upgraded from 10.x)
- **Filament**: 4.x (upgraded from 3.x)

## Breaking Changes

### 1. Minimum PHP Version

**Before (v1.x):**
```json
"php": "^8.1"
```

**After (v2.x):**
```json
"php": "^8.2"
```

### 2. Filament Version

**Before (v1.x):**
```json
"filament/filament": "^3.0"
```

**After (v2.x):**
```json
"filament/filament": "^4.0"
```

### 3. File Visibility

Filament v4 changed the default file visibility for non-local disks from `public` to `private`.

**v2.0 Solution:** We've added an explicit `visibility` configuration option that defaults to `public` to maintain backward compatibility.

```php
// config/filament-unlayer.php
return [
    'upload' => [
        // ... other options
        'visibility' => 'public', // NEW: Explicitly set visibility
    ],
];
```

## Step-by-Step Upgrade Process

### Step 1: Upgrade Your Application to Filament 4

First, upgrade your main application to Filament 4 following the [official Filament upgrade guide](https://filamentphp.com/docs/4.x/upgrade-guide).

### Step 2: Update Package Version

Update your `composer.json`:

```json
{
    "require": {
        "vati/filament-unlayer": "^2.0"
    }
}
```

**Note:** This package has been forked from `infinityxtech/filament-unlayer` and is now published as `vati/filament-unlayer`.

### Step 3: Update Dependencies

```bash
composer update vati/filament-unlayer
```

### Step 4: Republish Configuration (Optional)

If you want to use the latest configuration file with the new `visibility` option:

```bash
php artisan vendor:publish --tag="filament-unlayer-config" --force
```

**Note:** This will overwrite your existing config. Make sure to back up any custom settings first.

### Step 5: Test File Uploads

After upgrading, thoroughly test your file upload functionality:

1. Create a new form with the Unlayer field
2. Upload an image through the editor
3. Verify the image is accessible
4. Check that the file visibility is correct for your use case

## New Features in v2.0

### Enhanced Security Configuration

You can now add authentication middleware to protect the upload endpoint:

```php
// config/filament-unlayer.php
'middlewares' => ['auth:sanctum'], // or ['auth'] for web guard
```

### Explicit File Visibility Control

Configure file visibility per your requirements:

```php
// config/filament-unlayer.php
'visibility' => 'public', // or 'private'
```

### Environment-Based Configuration

You can now use environment variables for disk configuration:

```php
'disk' => env('FILAMENT_UNLAYER_DISK', 'public'),
```

## Troubleshooting

### Issue: Uploaded Images Not Accessible

**Solution:** Check your file visibility settings. If you're using a non-local disk (like S3), ensure the `visibility` is set to `public`:

```php
'visibility' => 'public',
```

### Issue: Upload Endpoint Returns 401/403

**Solution:** If you added authentication middleware, ensure users are properly authenticated before accessing forms with Unlayer fields.

### Issue: Composer Dependency Conflicts

**Solution:** Make sure your application is fully upgraded to Filament 4 and Laravel 11 before updating this package.

## Rollback Instructions

If you need to rollback to v1.x (original package):

```bash
composer require infinityxtech/filament-unlayer:^1.0
```

**Note:** This will switch back to the original package. You'll need to restore your previous configuration file if you republished it.

## Getting Help

- **Issues**: [GitHub Issues](https://github.com/vatichild/filament-unlayer/issues)
- **Changelog**: [CHANGELOG.md](CHANGELOG.md)
- **Filament Docs**: [Filament v4 Documentation](https://filamentphp.com/docs/4.x/)

## Version Compatibility Table

| Package | Version | Filament | PHP | Laravel |
|---------|---------|----------|-----|---------|
| infinityxtech/filament-unlayer | 1.x | 3.x | ^8.1 | ^10.0 |
| vati/filament-unlayer | 2.x | 4.x | ^8.2 | ^11.28 |
