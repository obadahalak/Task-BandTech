<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Auth\RegistrationService;
use App\Http\Requests\Auth\RegisterRequest;

class RegistrationController extends Controller
{
   
    public function __invoke(RegisterRequest $request,RegistrationService $registrationService)
    {
        return response()->json($registrationService->store($request));
    }
}
