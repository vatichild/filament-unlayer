<?php

namespace Vati\FilamentUnlayer\Services;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class UploadImage extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate(['file' => config('filament-unlayer.upload.validation')]);

        $path = $request->file('file')->store(
            config('filament-unlayer.upload.path'),
            [
                'disk' => config('filament-unlayer.upload.disk'),
                'visibility' => config('filament-unlayer.upload.visibility', 'public'),
            ]
        );

        return response()->json([
            'file' => [
                'url' => Storage::disk(config('filament-unlayer.upload.disk'))->url($path),
            ],
        ]);
    }
}
