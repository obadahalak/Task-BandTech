<?php

namespace App\Service\Auth;

use App\Http\Requests\AuthRequest ;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginService
{
    public function login(AuthRequest $request)
    {
        $admin = User::whereEmail($request->email)->first();

        if (! $admin || ! Hash::check($request->password, $admin->password)) {

            throw ValidationException::withMessages([
                'email' => ['Email or password not correct']]);
        }

        return ['token' => $admin->createToken('token-name', ['*'])->plainTextToken];
    }
}
