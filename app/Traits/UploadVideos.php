<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait UploadVideos
{
    public function UploadVideos($uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }

    public function deleteVideos($folder = null, $disk = 'public', $filename = null)
    {
        Storage::disk($disk)->delete($folder.$filename);
    }
}
