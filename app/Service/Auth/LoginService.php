<?php

namespace App\Service\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;

class LoginService
{
      /// --- User login --- ///
    public function login(LoginRequest $request)
    {
        $user = User::whereEmail($request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) 

            throw ValidationException::withMessages([
                'email' => ['Email or password not correct']]);
        

        return ['token' => $user->createToken('token-name', ['*'])->plainTextToken];
    }
}
