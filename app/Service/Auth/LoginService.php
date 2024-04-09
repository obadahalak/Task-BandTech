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
        // Find user by email
        $user = User::whereEmail($request->email)->first();

        ///Check the user is not exists or password is correct 
        if (! $user || ! Hash::check($request->password, $user->password)) 

            throw ValidationException::withMessages([
                'email' => ['Email or password not correct']]);
        
            //Generate access token
        return ['token' => $user->createToken('token-name', ['*'])->plainTextToken];
    }
}
