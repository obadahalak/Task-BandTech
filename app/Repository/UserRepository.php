<?php
namespace App\Repository;

use App\Models\User;
use App\Traits\UploadImage;
use App\helpers\ApiResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\User\UserRequest;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Validation\ValidationException;

class UserRepository implements UserInterface
{
    use UploadImage;
    public function index()
    {
        return User::all();
    }
    public function store(UserRequest $request)
    {
        User::create(
            [
                'avatar' => $this->upload($request->avatar,'user_avatar'),
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
    public function update(UpdateUserRequest $request, User $user)
    {
        dd(auth()->user());
        // $user = auth()->user();

        // $updatedFields = $this->getUpdatedFields($request, $user);

        // if ($request->filled('old_password')) {
        //     if (! $this->checkPassword($user, $request->old_password)) {
        //         return $this->responseError();
        //     }

        //     $updatedFields['password'] = $request->new_password;
        // }
        // $this->updateImage($user);
        // $user->update($updatedFields);

        // return $this->responseSuccess();
    }
    public function destroy(User $user)
    {
        $this->deleteImage($user->avatar,'user_avatar');
        $user->delete();

        return ApiResponse::deleteSuccessResponse();
    }



    // private function responseError()
    // {
    //     throw ValidationException::withMessages([
    //         'error' => ['old password  not correct'],
    //     ]);
    // }

    // private function responseSuccess()
    // {
    //     return response()->data(
    //         key: 'success',
    //         message: 'update profile sucessfully',
    //         statusCode: 200
    //     );
    // }

    // private function checkPassword($user, $old_password)
    // {
    //     return Hash::check($old_password, $user->password);
    // }

    // private function getUpdatedFields(UpdateUserRequest $request, $user)
    // {
    //     return [
    //         'name' => $request->input('name', $user->name),
    //         'username' => $request->input('username', $user->username),
    //         'email' => $request->input('email', $user->email),
    //         'avatar' => $this->upload($request->avatar,'user_avatar'),
    //     ];
    // }
}
