<?php

namespace App\Http\Controllers\Admin\System\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        $users = User::with('roles')->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function editRoles($userId)
    {
        $user = User::findOrFail($userId);
        $roles = Role::all();

        return view('admin.users.form', compact('user', 'roles'));
    }

    public function updateRoles(Request $request, $userId): RedirectResponse
    {
        $user = User::findOrFail($userId);

        $request->validate([
            'roles' => 'array',
            'permissions' => 'array',
        ]);

        $user->syncRoles($request->roles);
        $user->syncPermissions($request->permissions);

        return redirect()->route('admin.users.index')->with('success', 'Successfully updated roles.');
    }
}
