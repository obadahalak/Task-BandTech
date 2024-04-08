<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait ImageUpload
{
    public function uploadImage($folder)
    {
        return request()->file('avatar')->store($folder, 'public');
    }

    public function deleteImage($folder)
    {
        if (Storage::exists('public/' . $folder->image)) {
            Storage::delete('public/' . $folder->image);
        }
    }

    public function updateImage($folder)
    {
        $this->deleteAvatar($folder);
    }
}
