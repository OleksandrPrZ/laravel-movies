<?php
namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class ShowUserController extends Controller
{
    public function __invoke(User $user)
    {
        return response()->json($user);
    }
}
