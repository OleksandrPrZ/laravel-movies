<?php
namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UpdateUserController extends Controller
{
    public function __invoke(Request $request, User $user, UserService $userService)
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $user->id,
            'password' => 'sometimes|string|min:8|confirmed',
            'role' => 'sometimes|string|exists:roles,name',
        ]);

        $user = $userService->updateUser($user, $data);

        return response()->json($user);
    }
}
