<?php

namespace App\Services\Admin;

use App\Models\RoomImages;
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

    public static function uploadMultitipleImg($request,$roomId){
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $path = 'room_images/' . $filename;
                $image->move(public_path('room_images'), $filename);

                $roomImage = new RoomImages();
                $roomImage->file_name = $filename;
                $roomImage->file_path = $path;
                $roomImage->room_id = $roomId;
                $roomImage->save();
            }
        }
    }
}
