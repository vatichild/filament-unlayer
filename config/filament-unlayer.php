<?php

return [
    'upload' => [
        'url' => '/filament-unlayer-upload-action',
        'url_name' => 'filament-unlayer.upload',
        'class' => \Vati\FilamentUnlayer\Services\UploadImage::class,
        'disk' => 'public',
        'path' => 'unlayer',
        'validation' => 'required|image',
        'visibility' => 'public', // Set to 'public' for Filament v4 compatibility
        'middlewares' => [],
    ],
];
