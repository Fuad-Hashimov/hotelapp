<?php

namespace App\Services\Admin;
use Illuminate\Support\Facades\File;

class ImageUploadService
{
    public static function uploadImage($image, $destinationPath)
    {
        $path = $destinationPath;
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path($path), $imageName);
        return $path . $imageName;
    }

    public static function deleteImage($imagePath)
    {
        if (File::exists(public_path($imagePath))) {
            File::delete(public_path($imagePath));
        }
    }
}
