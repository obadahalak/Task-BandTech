<?php

namespace App\Http\Controllers\UserType;

use Illuminate\Http\Request;
use App\Service\UserTypeService;
use App\Http\Controllers\Controller;

class UserTypeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, UserTypeService $userTypeService)
    {
        return response()->json($userTypeService->index());
    }
}
