<?php
namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Services\UserService;

class ListUsersController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/users",
     *     summary="Retrieve the list of users",
     *     tags={"Users"},
     *     security={{"sanctum": {}}},
     *     @OA\Response(
     *         response=200,
     *         description="List of users successfully retrieved",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/User")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized"
     *     )
     * )
     */
    public function __invoke(UserService $userService)
    {
        $users = $userService->getAllUsers();

        return response()->json($users);
    }
}
