<?php
namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\Http\Requests\Api\User\CreateUserRequest;

class CreateUserController extends Controller
{
    public function __invoke(CreateUserRequest $request, UserService $userService)
    {
        $data = $request->validated();

        $user = $userService->createUser($data);

        return response()->json($user, 201);
    }
}
