<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserService
{
    public function createUser(array $data): User
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole($data['role']);

        return $user;
    }

    public function updateUser(User $user, array $data): User
    {
        $user->fill($data);

        if (isset($data['password'])) {
            $user->password = Hash::make($data['password']);
        }

        $user->save();

        if (isset($data['role'])) {
            $user->syncRoles($data['role']);
        }

        return $user;
    }

    public function deleteUser(User $user): void
    {
        $user->delete();
    }

    public function getAllUsers()
    {
        return User::with('roles')->get();
    }
}
