<?php

namespace App\Http\Controllers\Admin\System\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TokenController extends Controller
{

    public function generateFixedToken(Request $request): RedirectResponse
    {
        $userId = $request->input('user_id');
        if (!$userId) {
            return back()->withErrors(['error' => 'User ID is missing']);
        }
        $user = User::find($userId);
        if (!$user) {
            return back()->withErrors(['error' => 'User not found']);
        }
        $realToken = $user->createToken('fixed-api-token')->plainTextToken;

        return redirect()->route('admin.users.index')
            ->with('realToken', $realToken)
            ->with('userId' , $user->id)
            ->with('success', 'Token generated successfully');
    }
}
