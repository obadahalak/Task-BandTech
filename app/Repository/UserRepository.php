<?php
namespace App\Repository;

use App\Models\User;
use App\Traits\UploadImage;
use App\helpers\ApiResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Validation\ValidationException;

class UserRepository implements UserInterface
{
    use UploadImage;

    // View all users  ///
    public function index()
    {
        return User::all();
    }
    // Create a user 
    public function store(UserRequest $request)
    {
        User::create(
            [
                'avatar' => $this->upload($request->avatar, 'user_avatar'),
                'is_active' => true,
            ] + $request->validated(),
        );

        return ApiResponse::successResponse('created successfully');
    }
    // User view 
    public function show(User $user)
    {
        return $user;
    }
    /// View user editable
    public function edit(User $user)
    {
        return $user;
    }
    // Modification of the user account
    public function update(UpdateUserRequest $request, User $user)
    {
        $user = auth()->user();

        $updatedFields = $this->validatedFields($request, $user);

        if ($request->filled('old_password')) {
            if (!$this->checkPassword($user, $request->old_password)) {
                throw ValidationException::withMessages([
                    'error' => ['old password  not correct'],
                ]);
            }

            $updatedFields['password'] = $request->new_password;
        }

        $this->updateImage($user->avatar, 'user_avatar');
        $user->update($updatedFields);

        return ApiResponse::successResponse('update successful');
    }

    /// delete account
    public function destroy(User $user)
    {
        $this->deleteImage($user->avatar, 'user_avatar');
        $user->delete();

        return ApiResponse::successResponse('delete successful');
    }

    /// Fields to be modified
    private function validatedFields($request, $user)
    {
        return [
            'name' => $request->input('name', $user->name),
            'username' => $request->input('username', $user->name),
            'email' => $request->input('email', $user->email),
            'avatar' => $this->upload($request->avatar, 'user_avatar'),
            'type' => $request->input('type',$user->type),
        ];
    }

     /// Password verification
    private function checkPassword($admin, $old_password)
    {
        return Hash::check($old_password, $admin->password);
    }
}
