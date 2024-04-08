<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repository\UserInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;

class UserController extends Controller
{
    public function __construct(private UserInterface $UserRepository)
    {
    }
    public function index()
    {
        return response()->json($this->UserRepository->index());
    }

    public function store(UserRequest $request)
    {
        return response()->json($this->UserRepository->store($request));
    }

    public function show(User $user)
    {
        return response()->json($this->UserRepository->show($user));
    }

    public function edit(User $user)
    {
        return response()->json($this->UserRepository->edit($user));
    }

    public function update(UserRequest $request, User $user)
    {
        return response()->json($this->UserRepository->update($request, $user));
    }

    public function destroy(User $user)
    {
        return response()->json($this->UserRepository->destroy($user));
    }
}
