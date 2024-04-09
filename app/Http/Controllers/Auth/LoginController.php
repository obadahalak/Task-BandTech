<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Service\Auth\LoginService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
   
    public function __invoke(LoginRequest $request, LoginService $authAdminService)
    {
        return response()->json($authAdminService->login($request));
    }
}
