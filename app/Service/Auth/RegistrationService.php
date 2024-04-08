<?php

namespace App\Service\Auth;

use App\Models\User;
use App\helpers\ApiResponse;
use App\Traits\ImageUpload;
use App\Http\Requests\Auth\RegisterRequest;

class RegistrationService
{
    use ImageUpload;
    public function store(RegisterRequest $request)
    {
        User::create(
            [
                'avatar' => $this->ImageUpload('user_avatar'),
                'is_active' => false,
            ] + $request->validated(),
        );

        return ApiResponse::createSuccessResponse();
    }
}
