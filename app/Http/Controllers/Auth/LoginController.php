<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use App\Service\Auth\LoginService;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(AuthRequest $request, LoginService $authAdminService)
    {
        return response()->json($authAdminService->login($request));
    }
}
