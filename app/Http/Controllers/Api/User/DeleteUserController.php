<?php
namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;

class DeleteUserController extends Controller
{
    public function __invoke(User $user, UserService $userService)
    {
        $userService->deleteUser($user);

        return response()->json(['message' => 'User deleted successfully']);
    }
}
