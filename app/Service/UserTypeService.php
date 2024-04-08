<?php
// namespace app\Service\UserType;
namespace App\Service;

use App\Models\UserType;

class UserTypeService
{
    public function index()
    {
        return UserType::get(['type', 'discount']);
    }
}
