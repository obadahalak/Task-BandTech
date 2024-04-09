<?php

namespace App\Service\Auth;

use App\Models\User;
use App\helpers\ApiResponse;
use App\Traits\ImageUpload;
use App\Http\Requests\Auth\RegisterRequest;
use App\Traits\UploadImage;

class RegistrationService
{
    use UploadImage;

      /* Create a user account and 
      The is_active is modified to false or true according to requirements
      */
    public function store(RegisterRequest $request)
    {
        User::create(
            [
                'avatar' => $this->upload($request->avatar,'user_avatar'),
                'is_active' => false,
            ] + $request->validated(),
        );

        return ApiResponse::successResponse('created successfully');
    }
}
