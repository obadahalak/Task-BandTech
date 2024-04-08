<?php
namespace App\Repository;

use App\Models\User;
use App\Http\Requests\User\UserRequest;

interface UserInterface
{
    public function index();
    public function store(UserRequest $request);
    public function show(User $user);
    public function edit(User $user);
    public function update(UserRequest $request, User $user);
    public function destroy(User $user);
}