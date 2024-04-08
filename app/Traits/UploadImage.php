<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadImage
{
    public function upload($image, $folderName)
    {
        return $image->store($folderName, 'public');
    }

    public function deleteImage($image,$folderName){
        if (Storage::exists('public/' .$image, $folderName)) {
            Storage::delete('public/' .$image, $folderName);
        }
    }

    public function updateImage($folder){
        $this->deleteAvatar($folder);
    }
}
