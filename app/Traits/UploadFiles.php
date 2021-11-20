<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use Storage;

trait UploadFiles
{

public function uploadImage($uploadedFile, $folder = null, $disk = 'public', $filename = null)

    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }

public function deleteImage($folder = null, $disk = 'public', $filename = null)
    {
        Storage::disk($disk)->delete($folder.$filename);
    }

}
