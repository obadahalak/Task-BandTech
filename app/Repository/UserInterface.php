<?php
namespace App\Repository;

use App\Models\User;
use App\Http\Requests\User\UserRequest;
use App\Http\Requests\User\UpdateUserRequest;

interface UserInterface
{
    public function index();
    public function store(UserRequest $request);
    public function show(User $user);
    public function edit(User $user);
    public function update(UpdateUserRequest $request, User $user);
    public function destroy(User $user);
}