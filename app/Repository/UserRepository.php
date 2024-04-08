<?php
namespace App\Repository;

use App\Models\User;
use App\helpers\ApiResponse;
use App\Traits\ImageUpload;
use App\Http\Requests\User\UserRequest;

class UserRepository implements UserInterface
{
    use ImageUpload;
    public function index()
    {
        return User::all();
    }
    public function store(UserRequest $request)
    {
        User::create(
            [
                'avatar' => $this->uploadImage('user_avatar'),
                'is_active' => false,
            ] + $request->validated(),
        );

        return ApiResponse::createSuccessResponse();
    }
    public function show(User $user)
    {
        return $user;
    }
    public function edit(User $user)
    {
        return $user;
    }
    public function update(UserRequest $request, User $user)
    {
        return 'asd';
    }
    public function destroy(User $user)
    {
        $this->deleteImage($user);
        $user->delete();

        return ApiResponse::deleteSuccessResponse();
    }
}
